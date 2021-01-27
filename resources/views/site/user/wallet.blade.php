@extends('site.layout')
@section('title' , 'المحفظة || خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item active" aria-current="page">المحفظة</li>
        </ol>
    </div>
    <section class="profile-wallet all-sections">
        <div class="row">
            <div class="container">
                <div class="profile-wallet-wrap">
                    <h3>الرصيد الحالي</h3>
                    @if($wallet)
                        <p>{{$wallet->amount}} ريال</p>
                    @else
                        <p>لا يوجد</p>
                    @endif
                    <a href="#" class="btn-hvr"> شحن الرصيد </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
