@extends('front.layouts.master')

@section("title","Enes ÖZÜDOĞRU")
@section("title2","Ana Sayfa")

@section('content')

    <div class=" col-md-9 mx-auto">
        @include("front.widgets.newList")
    </div>


    @include("front.widgets.categoryWidget")


@endsection
