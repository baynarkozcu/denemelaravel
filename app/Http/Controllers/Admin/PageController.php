<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){

        $pages = Page::orderBy("order")->get();

        return view("Admin.pages.index",compact("pages"));
    }


    public function create(){
        return view("Admin.pages.create");
    }


    public function sayfapost(Request $r){

        $last = Page::orderBy("order", "DESC")->first();


        $page = new Page;
        $page->pageTitle = $r->title;
        $page->pageContent = $r->content;
        $page->pageImage = "https://3.bp.blogspot.com/-Hied9vPkU6o/WJ33_wSLfmI/AAAAAAAAAHk/exNn961_KGMTjun2Xx2SKrZ1GTAxI2zCQCLcB/s1600/Full%2BHD%2BResimler%2B%252822%2529.jpg";
        $page->order = $last->order+1;
        $page->save();

        return redirect()->route("sayfalar");

    }


    public function sayfaduzenle($id){

        $page = Page::findOrFail($id);

        return view("Admin.pages.edit", compact("page"));

        /*
        $page = Page::find($r->id);
        $page->pageTitle = $r->title;
        $page->pageContent = $r->content;
        $page->pageImage = "https://3.bp.blogspot.com/-Hied9vPkU6o/WJ33_wSLfmI/AAAAAAAAAHk/exNn961_KGMTjun2Xx2SKrZ1GTAxI2zCQCLcB/s1600/Full%2BHD%2BResimler%2B%252822%2529.jpg";
        $page->save();

        return redirect()->route("sayfalar");
        */

    }

    public function sayfaduzenlepost(Request $r, $id){

        $page = Page::findOrFail($id);

        $page = Page::find($r->id);
        $page->pageTitle = $r->title;
        $page->pageContent = $r->content;
        $page->pageImage = "https://3.bp.blogspot.com/-Hied9vPkU6o/WJ33_wSLfmI/AAAAAAAAAHk/exNn961_KGMTjun2Xx2SKrZ1GTAxI2zCQCLcB/s1600/Full%2BHD%2BResimler%2B%252822%2529.jpg";
        $page->save();

        return redirect()->route("sayfalar");

    }

    public function sayfasil($id){
        $page = Page::findOrFail($id)->delete();
        return redirect()->route("sayfalar");
    }

    public function siralama(Request $r){

        foreach($r->get('page') as $key => $order){
            Page::where("id",$order)->update(['order'=> $key]);
        }
    }
}
