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
            <li class="breadcrumb-item active" aria-current="page">عناوينى</li>
        </ol>
    </div>

    <section class="profile-addresses all-sections">
        <div class="row">
                <div class="container">
                    @include('dashboard.layouts.status')

                    @if(count($addresses) > 0)
                    @foreach($addresses as $address)
                        <div class="col-md-6 col-xs-12">
                            <div class="addres-wrap">
                                <h4>التوصيل على عنوان المنزل</h4>
                                <span class="name-u">
                          {{$address->name}}
                    </span>
                                <span class="addres-u">{{$address->district->name}}</span>
                                <span class="addres2-u">{{$address->district->region->name}}</span>
                                <span class="country-u">{{$address->district->region->city->name}}</span>
                                <a href="tell:{{$address->phone}}" class="phone-u">{{$address->phone}}</a>
                                <a href="{{url('profile-add-address')}}">تغيير العنوان</a>
                                <button class="delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p class="text-center alert alert-danger">لا يوجد</p>
                    @endif
                </div>
        </div>
        <div class="row">
            <a href="{{route('website.users.addresses.create')}}" class="btn-hvr"> إضافة عنوان </a>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".delete").on("click", function () {
                $(this).parent().remove();
            })
        })
    </script>
@endsection