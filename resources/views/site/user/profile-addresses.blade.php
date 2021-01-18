@extends('site.layout')
@section('title' , 'العناوين | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{url('/categories')}}">حسابى</a></li>
        <li class="breadcrumb-item active" aria-current="page">عناوينى </li>
    </ol>
</div>
<section class="profile-addresses all-sections">
    <div class="row">
        <div class="container">
            <div class="col-md-6 col-xs-12">
                <div class="addres-wrap">
                    <h4>التوصيل على عنوان المنزل</h4>
                    <span class="name-u">
                        محمد السيد ابراهيم
                    </span>
                    <span class="addres-u">السعودية - القصيم -قسم اول - طريق الملك فهد</span>
                    <span class="addres2-u">القصيم-قسم اول</span>
                    <span class="country-u">ألسعودية</span>
                    <a href="tell:+993546588721644" class="phone-u">+993546588721644</a>
                    <a href="{{url('profile-add-address')}}">تغيير العنوان</a>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="addres-wrap">
                    <h4>التوصيل على عنوان المكتب</h4>
                    <span class="name-u">
                        خالد احمد وليد
                    </span>
                    <span class="addres-u">السعودية - القصيم -قسم اول - طريق الملك فهد</span>
                    <span class="addres2-u">القصيم-قسم اول</span>
                    <span class="country-u">ألسعودية</span>
                    <a href="tell:+993546588721644" class="phone-u">+993546588721644</a>
                    <a href="{{url('profile-add-address')}}">تغيير العنوان</a>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="addres-wrap">
                    <h4>التوصيل على عنوان المنزل</h4>
                    <span class="name-u">
                        ابراهيم محمد ابراهيم
                    </span>
                    <span class="addres-u">السعودية - القصيم -قسم اول - طريق الملك فهد</span>
                    <span class="addres2-u">القصيم-قسم اول</span>
                    <span class="country-u">ألسعودية</span>
                    <a href="tell:+993546588721644" class="phone-u">+993546588721644</a>
                    <a href="{{url('profile-add-address')}}">تغيير العنوان</a>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="addres-wrap">
                    <h4>التوصيل على عنوان العمل</h4>
                    <span class="name-u">
                        كريم السيد ابراهيم
                    </span>
                    <span class="addres-u">السعودية - القصيم -قسم اول - طريق الملك فهد</span>
                    <span class="addres2-u">القصيم-قسم اول</span>
                    <span class="country-u">ألسعودية</span>
                    <a href="tell:+993546588721644" class="phone-u">+993546588721644</a>
                    <a href="{{url('profile-add-address')}}">تغيير العنوان</a>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{url('profile-add-address')}}" class="btn-hvr"> إضافة عنوان </a>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(".delete").on("click", function() {
            $(this).parent().remove();
        })
    })
</script>
@endsection
