@extends('site.layout')
@section('title' , 'إضافة عنوان | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{url('/profile')}}">حسابى</a></li>
        <li class="breadcrumb-item active" aria-current="page">إضافة عنوان</li>
    </ol>
</div>
<section class="profile-add-addresses all-sections">
    <div class="row">
        <div class="container">
            <form class="add-addresses-form" action="{{url('profile-addresses')}}">
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="المدينة">
                        <div class="hov-input">
                            <label>المدينة</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="المنطقة">
                        <div class="hov-input">
                            <label>المنطقة</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="الحى">
                        <div class="hov-input">
                            <label>الحى</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="الشارع ">
                        <div class="hov-input">
                            <label>الشارع </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="رقم المنزل ">
                        <div class="hov-input">
                            <label>رقم المنزل </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="تفاصيل العنوان ">
                        <div class="hov-input">
                            <label>تفاصيل العنوان </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-hvr"> إضافة عنوان </button>
            </form>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
