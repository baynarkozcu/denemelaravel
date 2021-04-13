<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("Admin.categories.index",compact("categories"));

    }

    public function createCategory(Request $r){


        $isExist = Category::where("name",$r->category)->first();

        if($isExist){
            return redirect()->route("categories");
        }else{
            $category = new Category;
            $category->name = $r->category;
            $category->save();

            return redirect()->route("categories");
        }


    }


    public function getdata(Request $r){
        $category = Category::findOrFail($r->id);
        return response()->json($category);
    }

    public function editdata(Request $r){




        $isExist = Category::where("name",$r->category)->whereNotIn("id",[$r->id])->first();

        if($isExist){
            return redirect()->route("categories");
        }else{
            $category = Category::find($r->id);
            $category->name = $r->category;
            $category->save();

            return redirect()->route("categories");
        }

    }


    public function deletedata(Request $r){

        $category = Category::findOrFail($r->id);
        if($category->newsCount()>0){
            News::where("categoryID",$category->id)->delete();
        }

        $category->delete();
        return redirect()->route("categories");

    }

}
