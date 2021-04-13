
@extends('front.layouts.master')

@section("title","Haberler")
@section("title2","$news->title")
@section("bg","https://lh3.googleusercontent.com/BdQ1ngugnmV6uT960KOX0G9av7YJF4MnoEdSgi5xBINEC4YYuOp3Q7RUj7i4Cg0tRQ=w884")

@section('content')

<article>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

        <h2 class="section-heading">{{$news->title}}</h2>

        <p> {{$news->content}} </p>

        </div>
    </div>
    </div>
</article>


@endsection
