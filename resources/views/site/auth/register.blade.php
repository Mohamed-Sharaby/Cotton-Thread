@extends('site.layout')
@section('title' , 'تسجيل جديد | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="static-page register all-sections">
    <div class="container">
        <div class="row">
            <form class="static-page-form" action="{{ route('register') }}" method="POST" id="registerForm" >
                @csrf
                <a href="{{url('/')}}">
                    <img src="{{asset('website/img/logo-wide.png')}}">
                </a>
                <h2>إنشاء حساب</h2>
                <div class="input-wrap">
                    <input type="text" placeholder="+992648******" name="phone">
                    <div class="hov-input">
                        <label>رقم الجوال</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="text" placeholder="Karim EL******" name="name">
                    <div class="hov-input">
                        <label>الاسم</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="email" placeholder="user@user.com" name="email">
                    <div class="hov-input">
                        <label>البريد الإلكترونى</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="password" placeholder="........" name="password">
                    <div class="hov-input">
                        <label>كلمة المرور</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="password" placeholder="........" name="password_confirmation">
                    <div class="hov-input">
                        <label> تأكيد كلمة المرور </label>
                    </div>
                </div>
                <button type="submit" class="btn-hvr">انشاء حساب</button>
                <a href="{{route('login')}}" class="btn-hvr bg-w">تسجيل دخول</a>
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
    <script src="{{asset('website/js/user/register.js')}}"></script>
@endsection
