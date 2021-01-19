@extends('site.layout')
@section('title' , 'تغيير كلمة المرور | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="static-page all-sections">
    <div class="container">
        <div class="row">
            <form action="{{url('/profile')}}" class="static-page-form">
                <a href="{{url('/')}}">
                    <img src="{{asset('website/img/logo-wide.png')}}">
                </a>
                <h2>تغيير كلمة المرور</h2>
                <div class="input-wrap">
                    <input type="password" placeholder="........">
                    <div class="hov-input">
                        <label>كلمة المرور</label>
                    </div>
                </div>
                <div class="input-wrap">
                    <input type="password" placeholder="........">
                    <div class="hov-input">
                        <label> تأكيد كلمة المرور </label>
                    </div>
                </div>
                <button type="submit" class="btn-hvr">حفظ</button>
            </form>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
