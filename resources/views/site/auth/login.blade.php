@extends('site.layout')
@section('title' , 'تسجيل الدخول | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="static-page all-sections">
    <div class="container">
        <div class="row">
            <form class="static-page-form" id="loginForm" autocomplete="off">
                @csrf
                <a href="{{url('/')}}">
                    <img src="{{asset('website/img/logo-wide.png')}}">
                </a>
                <h2>تسجيل دخول </h2>
                <div class="input-wrap">
                    <input type="text" placeholder="رقم الجوال" name="phone">
                    <div class="hov-input">
                        <label>رقم الجوال</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="password" placeholder="........" name="password">
                    <div class="hov-input">
                        <label>كلمة المرور</label>
                    </div>
                </div>
                <div class="form">
                    <input id="check" type="checkbox" name="remember" value="1"/>
                    <label for="check" style="--d: '+d+' px">
                        <svg viewBox="0,0,50,50">
                            <path d="M5 30 L 20 45 L 45 5"></path>
                        </svg>
                    </label>
                    تذكرنى؟
                </div>
                <a class="forget-pass" href="{{url('/reset')}}">نسيت كلمة المرور ؟</a>
                <button type="submit" class="btn-hvr">تسجيل دخول</button>
                <a href="{{route('register')}}" class="btn-hvr bg-w">انشاء حساب</a>
                <span class="media-tit">او سجل بحساب التواصل الاجتماعى</span>
                <ul class="social">
                    <li><a href="www.facebook.com" target="_blank" class="icon-f"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="www.google.com" target="_blank" class="icon-g"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="www.twitter.com" target="_blank" class="icon-tw"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="www.instagram.com" target="_blank" class="icon-ig"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </form>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/login.js')}}"></script>
@endsection
