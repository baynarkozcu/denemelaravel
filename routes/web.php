<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
|                    Admin Routes
|--------------------------------------------------------------------------
*/

            //->name("admin") Şeklinde Grup İçerisindeki route ların isimlerini de tekrardan kurtarabiliriz.
Route::prefix("panel")->middleware("admin")->group(function(){
    Route::get('', 'Admin\DashboardController@index')->name('adminpanel');
    Route::get('cikis', 'Admin\AuthController@logOut')->name('logout');

                        //!HABERLER
    Route::get('haberler/silinenler', 'Admin\NewsController@silinenler')->name("silinenler");
    Route::get('/restore/{id}', 'Admin\NewsController@restore')->name("restore");
    Route::get('/hardDelete/{id}', 'Admin\NewsController@hardDelete')->name("hardDelete");
    Route::resource('haberler', 'Admin\NewsController');
    Route::get('sil/{id}', 'Admin\NewsController@newDelete')->name('delete');

                        //!KATEGORİLER
    Route::get('/kategoriler', 'Admin\CategoryController@index')->name("categories");
    Route::post('/kategoriekle', 'Admin\CategoryController@createCategory')->name("createCategory");
    Route::post('/kategori/editdata', 'Admin\CategoryController@editdata')->name("editdata");
    Route::get('/kategori/getdata', 'Admin\CategoryController@getdata')->name("getdata");
    Route::post('/kategori/deletedata', 'Admin\CategoryController@deletedata')->name("deletedata");

                        //!SAYFALAR
    Route::get('sayfalar','Admin\PageController@index')->name("sayfalar");
    Route::get('sayfalar/olustur','Admin\PageController@create')->name("sayfaolustur");
    Route::post('sayfalar/olustur','Admin\PageController@sayfapost')->name("sayfapost");
    Route::get('sayfalar/duzenle/{id}','Admin\PageController@sayfaduzenle')->name("sayfaduzenle");
    Route::post('sayfalar/duzenle/{id}','Admin\PageController@sayfaduzenlepost')->name("sayfaduzenlepost");
    Route::get('sayfalar/sil/{id}','Admin\PageController@sayfasil')->name("sayfasil");
    Route::get('sayfalar/siralama','Admin\PageController@siralama')->name("siralama");

                        //! CHARTS -- GRAFİKLER
    Route::get("chart", "Admin\ChartController@index")->name("charts");

});

Route::prefix("panel")->middleware("loginMid")->group(function(){
    Route::get('login', 'Admin\AuthController@login')->name('login');
    Route::post('login', 'Admin\AuthController@loginPost')->name('loginPost');
});













/*
|--------------------------------------------------------------------------
|                       Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Front\HomeController@index')->name('homepage');
Route::get('/contact', 'Front\HomeController@contact')->name('contact');
Route::post('/contact', 'Front\HomeController@contactPost')->name('contactPost');
Route::get('/kategori/{category}', 'Front\HomeController@category')->name('category');
Route::get('/blog/{id}', 'Front\HomeController@single')->name('newspage');
Route::get('/{page}', 'Front\HomeController@page')->name('page');




