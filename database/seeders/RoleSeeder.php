<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //generate roles from json
         $json = File::get("database/data/roles.json");

         if($json){

             $data = json_decode($json);

             foreach($data as $obj){
                 Role::create([
                     'name' => $obj->name,
                     'guard_name' => 'web'
                 ]);
             }
         }
    }
}
