@extends('site.layout')
@section('title' , ' إستعادة كلمة المرور | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="static-page all-sections">
    <div class="container">
        <div class="row">
            <form action="{{url('/send-code')}}" method="get" class="static-page-form">
                @csrf
                <a href="{{url('/')}}">
                    <img src="{{asset('website/img/logo-wide.png')}}">
                </a>
                <h2>إستعادة كلمة المرور</h2>
                @include('dashboard.layouts.status')
                <div class="input-wrap">
                    <input type="text" placeholder="رقم الجوال" name="phone" required value="{{old('phone')}}"
                           oninvalid="this.setCustomValidity(' رقم الجوال مطلوب')"
                           onchange="this.setCustomValidity('')">
                    <div class="hov-input">
                        <label>رقم الجوال</label>
                    </div>
                </div>
                <button type="submit" class="btn-hvr">متابعة</button>
            </form>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
