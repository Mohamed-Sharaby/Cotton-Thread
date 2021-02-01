@extends('site.layout')
@section('title' , ' خيط وقطن'.' || '.$categoryName->name )
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
                <li class="breadcrumb-item active" aria-current="page">الأقسام الفرعية</li>
            </ol>
        </div>
    </div>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End large breadcrumbs |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start Main Categories |||||||||||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <div class="row">

            @foreach($subCategories as $subCategory)
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a href="{{route('website.products.index',['id' => $subCategory->id])}}" class="flex_prod main_categ">
                    <div class="im_prod">
                        <img src="{{$subCategory->image}}" alt="{{$subCategory->name}}">
                    </div>
                    <div class="descrp_body">
                        <h4 class="name_prod">{{$subCategory->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Main Categories |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
