<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\News::factory(25)->create();

                    //! ESKİ KULLANIM
        /*
        $names = ["enes","mert", "tunca"];

        foreach($names as $name){

            DB::table('news')->insert([
                "title"=> $name,
                "categoryID"=> rand(1,5),
                "content"=> bcrypt(123456),


            ]);


        }
        */
    }
}
