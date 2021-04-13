<?php
namespace App\Http\Controllers\Front;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;


use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Models\Contact;




class HomeController extends Controller
{
    public function __construct()
    {
                //Bun Controller İçerisinde Oluşacak Kod Tekrarını Önlemek Amacıyla Bu Yapı Oluşturuluyor. View()->share methodu ile tüm sayfalara iletiliyor.
        view()->share("pages",$data["pages"]= Page::orderBy("order","ASC")->get());
        view()->share("categories",$data['categories'] = Category::inRandomOrder()->get());
    }


    public function index()
    {
                                                    //Sayfalama Mantığı
        $data['news'] = News::orderBy("created_at", "DESC")->paginate(5);
                                    //Sayfa için Ayrı bir Link Oluşturma...
                                    //$data["news"]->withPath(url("sayfa"));
        return view('front.homepage', $data);
    }


    public function single($id)
    {
        $data["news"] = News::where("id",$id)->first() ?? abort(404, "Hata");
        return view("front.news", $data);
    }


    public function category($category)
    {
        $kategori = Category::where("name",$category)->first();
        $data["news"] = News::where("categoryID", $kategori->id)->orderBy("created_at","DESC")->paginate(5);
        $data["category"] = $category;
        return view("front.category",$data);


    }

    public function page($page){

        $data["page"] = Page::where("id",$page)->first();
        return view("front.customPage",$data);
    }

    public function contact(){

       return view("front.contact");
    }



    public function contactPost(Request $r){


                //Validator Kullanımı
        /*

        $rules = [
            "name" => "required|min:5",
            "email" => "required",
            "message" => "required"
        ];
        $validate =Validator::make($r->post(),$rules);
        if($validate->fails()){
            return redirect()->route("contact)->withErrors($validate)->withInput();
        }

*/

        $contact = new Contact;
        $contact->name = $r->name;
        $contact->email = $r->email;
        $contact->topic = $r->topic;
        $contact->message = $r->message;

        $contact->save(); 
        return redirect()->route("contact")->with("success", "Mesajınız En Kısa Süre İçerisinde İncelenip; Belirttiğiniz İletişim Adresi yolu ile Bilgilendirileceksiniz..");



    }


}













