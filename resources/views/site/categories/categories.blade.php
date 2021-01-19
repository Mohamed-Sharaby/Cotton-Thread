@extends('site.layout')
@section('title' , 'الأقسام | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start large breadcrumbs |||||||||||||||||||||||||||| -->
<div class="lg_brdc">
    <div class="container">
        <div class="bread_inn">
            <h1>الأقسام</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الأقسام الرئيسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End large breadcrumbs |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start Main Categories |||||||||||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a href="{{route('website.categories.subCategories',$category->id)}}" class="flex_prod main_categ">
                    <div class="im_prod">
                        <img src="{{$category->image}}" alt="{{$category->name}}">
                    </div>
                    <div class="descrp_body">
                        <h4 class="name_prod">{{$category->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">رجالى</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">أطفال</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset8.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">شنط</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset2.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">حريمى</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">رجالى</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">أطفال</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-4 col-xs-6">--}}
{{--                <a href="{{url('categories-sub')}}" class="flex_prod main_categ">--}}
{{--                    <div class="im_prod">--}}
{{--                        <img src="{{asset('website/img/asset8.jpg')}}" alt="product name">--}}
{{--                    </div>--}}
{{--                    <div class="descrp_body">--}}
{{--                        <h4 class="name_prod">شنط</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Main Categories |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
