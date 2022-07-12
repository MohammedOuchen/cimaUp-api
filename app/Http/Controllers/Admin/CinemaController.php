<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = Cinema::all();
        $cinemas->load([ 'media'])->append(['firstMediaUrl']);
        return Inertia::render('Admin/Cinema/index',[
            'cinemas' => $cinemas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = User::role('owner')
                         ->get();

        return Inertia::render('Admin/Cinema/create',[
            'partners' => $partners,
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

        $cinema = Cinema::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'additional_address' => $request['additional_address'],
            'poste_code' => $request['post_code'],
            'city' => $request['city'],
            'country' => $request['country'],
            'active' => $request['active'],
            'user_id' => $request['user_id'],
        ]);

        $cinema->addMediaFromRequest('image')->toMediaCollection('images_cinemas');

       return redirect()->route('admin.cinema.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cinema = Cinema::findorFail($id);
        $cinema->delete();

        return back();
    }
}
