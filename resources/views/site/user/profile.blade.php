@extends('site.layout')
@section('title' , 'الحساب الشخصي | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">حسابى</li>
    </ol>
</div>
<!-- /////////////////////||||||||||| start my_profile |||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <div class="my_info">
            <a href="{{auth()->user()->image}}" data-fancybox="gallery" class="user_img">
                <img src="{{auth()->user()->image}}">
            </a>
            <ul class="user_info">
                <li>
                    <p>اسم المستخدم</p>
                    <h4>{{auth()->user()->name}} </h4>
                </li>
                <li>
                    <p>البريد الإلكترونى</p>
                    <h4>{{auth()->user()->email}}</h4>
                </li>
                <li>
                    <p>رقم الجوال</p>
                    <h4>{{auth()->user()->phone}}</h4>
                </li>
                <li>
                    <p>المدينة</p>
                    <h4>السعودية - القصيم - بريدة</h4>
                </li>
            </ul>
        </div>
        <div class="flx_anchors">
            <button type="button" class="btn-hvr" data-toggle="modal" data-target="#resetPassModal">
                تعديل الحساب
            </button>
        </div>
    </div>
</section>
@include('site.modals.reset-pass-modal')
<!-- /////////////////////|||||||||||End my_profile |||||||||||||||||||| -->
@endsection
@section('scripts')
<script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>
@endsection
