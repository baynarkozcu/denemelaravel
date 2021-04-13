@extends('front.layouts.master')

@section("title",$category)
@section("title2",$category)

@section('content')

    <div class=" col-md-9 mx-auto">
        @include("front.widgets.newList")
    </div>

        @include("front.widgets.categoryWidget")

@endsection
