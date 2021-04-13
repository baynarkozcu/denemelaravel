<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ["Hakkımızda","Çalışmalarım"];
        $count = 0;

        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
                "pageTitle"=> $page,
                "pageImage"=> "https://3.bp.blogspot.com/-Hied9vPkU6o/WJ33_wSLfmI/AAAAAAAAAHk/exNn961_KGMTjun2Xx2SKrZ1GTAxI2zCQCLcB/s1600/Full%2BHD%2BResimler%2B%252822%2529.jpg",
                "pageContent"=> "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
                "order"=>$count,
            ]);
        }
    }
}
