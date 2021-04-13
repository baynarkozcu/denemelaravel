@extends('front.layouts.master')

@section("title"," $page->pageTitle")
@section("title2","$page->pageTitle")
@section("bg","$page->pageImage")

@section('content')
<div class="col-lg-8 col-md-10 mx-auto">

    {{$page->pageContent}}


</div>
@endsection
