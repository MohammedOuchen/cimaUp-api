<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query()
                ->with('roles')
                ->when($request->has('roles') && Role::all()->contains('name', $request->roles), function ($user) use ($request){
                    return $user->whereHas('roles', function($role) use ($request) {
                        return $role->where('name', $request->roles);
                    });;
                })
                ->orderBy('id', 'desc')
                ->get();

        return Inertia::render('Admin/User/index', [
                'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return Inertia::render('Admin/User/create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->all();
        $validated['active'] = 1;
        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = collect(User::find($id));
        if(!$users){
            return back();
        }
        $users->put('roles', array_values(User::query()->findOrFail($id)->roles->pluck('id')->toArray()));

        $roles = Role::all();

        return Inertia::render('Admin/User/create', [
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->all();

        $user = User::findOrFail($id);

        $user->update($validated);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return back();
    }
}
