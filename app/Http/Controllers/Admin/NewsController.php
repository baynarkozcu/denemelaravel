<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy("created_at","DESC")->get();
        return view("Admin.news.index", compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("Admin.news.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->post());


        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $new = new News;
        $new->title = $request->title;
        $new->categoryID = $request->category;
        $new->content = $request->content;

        $new->image = $imageName;
        $new->save();
        return redirect()->route("haberler.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $new = News::findorFail($id);
        return view("Admin.news.edit",compact("new","categories"));
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

        $new = News::findOrFail($id);
        $new->title = $request->title;
        $new->categoryID = $request->category;
        $new->content = $request->content;
        $new->image = "görseller";
        $new->save();
        return redirect()->route("haberler.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->route("haberler.index");
    }

    public function newDelete($id){
        News::find($id)->delete();
        return redirect()->route("haberler.index");
    }

    public function silinenler(){
       $news = News::onlyTrashed()->orderBy("deleted_at","DESC")->get();

       return view("Admin.news.trashed",compact("news"));
    }

    public function restore($id){


                        //! SİLİNENLERDEN ÇIKARIRKEN KATEGORİSİNE BAKILMASI GEREKİYOR EĞER KATEGORİSİ SİLİNMİŞ İSE YENİ BİR KATEGORİ ATAMASI YAPILMALI...

        News::onlyTrashed()->find($id)->restore();
        return redirect()->route("silinenler");
    }

    public function hardDelete($id){
        News::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route("silinenler");
   }
}
