@extends('site.layout')
@section('title' , 'خيط وقطن'. ' || ' . __($page->title))
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__($page->title)}}</li>
    </ol>
</div>
<section class="about all-sections">
    <div class="container">
        <div class="row">
            <p>{{$page->value}}</p>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
