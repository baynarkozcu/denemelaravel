<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Admin::factory(5)->create();

        /*
        $names = ["enes","mert", "tunca"];

        foreach($names as $name){

            DB::table('admins')->insert([
                "name"=> $name,
                "email"=> "tunca@enes.com",
                "password"=> bcrypt(123456),


            ]);
        }
        */
    }
}
