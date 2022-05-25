<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //generate admins from json
        $json = File::get("database/data/admins.json");

        if($json){

            $data = json_decode($json);

            foreach($data as $obj){
                User::create(array(
                    'first_name' => $obj->first_name,
                    'last_name' => $obj->last_name,
                    'email' => $obj->email,
                    'active' => true,
                    'password' => isset($obj->password) ? Hash::make($obj->password) : Hash::make("Password-1234"),
                    'remember_token' => Str::random(10),
                    'email_verified_at' => now(),
                ))->assignRole(Role::findOrCreate('Super-Admin'));
            }
        }
    }
}
