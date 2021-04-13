@extends('front.layouts.master')

@section("title","Enes ÖZÜDOĞRU")
@section("title2","İletişim")
@section("bg","https://wallpaperaccess.com/full/3124535.jpg")
@section('content')



<div class="col-lg-8 col-md-10 mx-auto">


        @if (session("success"))
        <div class="alert alert-success">
            {{session("success")}}
        </div>
        @endif


    <p>Bizimle İletişime Geçebilirsiniz.</p>
    <form method="POST" action="{{route("contactPost")}}" >
        @csrf
      <div class="control-group">
        <div class="form-group  controls">
          <label>Adınız Soyadınız : </label>
          <input type="text" class="form-control" placeholder="Adınız Soyadınızı Giriniz" name="name" required >
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group  controls">
          <label>Email Adresiniz : </label>
          <input type="email" class="form-control" placeholder="Email Adresinizi Giriniz" name="email" required >
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12  controls">
          <label>Konu : </label>
          <select class="form-control" name="topic">
            <option>Bilgi</option>
            <option>Destek</option>
            <option>Genel</option>
          </select>

        </div>
      </div>
      <div class="control-group">
        <div class="form-group  controls">
          <label>Mesajınız : </label>
          <textarea rows="5" class="form-control" placeholder="Lütfen Bildirmek İstediğiniz Mesajı Giriniz" name="message"  ></textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <br>
      <div id="success"></div>
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder   </button>
    </form>
  </div>


@endsection















