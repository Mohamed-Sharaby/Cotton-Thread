@extends('site.layout')
@section('title' , 'إضافة عنوان || خيط وقطن')
@section('styles')
    <style>
        .invalid-feedback{
            color: red;
        }
    </style>
@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item active" aria-current="page">إضافة عنوان</li>
        </ol>
    </div>
    <section class="profile-add-addresses all-sections">
        <div class="row">
            <div class="container">
                <form class="add-addresses-form" action="{{route('website.users.addresses.store')}}" method="post">
                    @csrf
                    {{--                <div class="col-md-6 col-xs-12">--}}

                    <div class="form-group row">
                        <label for="name" class="col-form-label col-lg-2">الاسم</label>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="name"
                                   class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                   placeholder="الاسم">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label for="phone" class="col-form-label col-lg-2">رقم الجوال</label>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="phone"
                                   class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}"
                                   placeholder="الجوال">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city_id" class="col-form-label col-lg-2">المدينة</label>
                        <div class="col-12 col-lg-4">
                            <select name="city_id" id="city_id"
                                    class="form-control {{$errors->has('city_id') ? ' is-invalid' : null}}">
                                <option selected disabled>اختر المدينة</option>
                                @foreach(\App\Models\City::all() as $city)
                                    <option
                                        value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="region_id" class="col-form-label col-lg-2">المنطقة</label>
                        <div class="col-12 col-lg-4">
                            <select name="region_id" id="region_id"
                                    class="form-control {{$errors->has('region_id') ? ' is-invalid' : null}}">
                                <option selected disabled>اختر المنطقة</option>
{{--                                @foreach(\App\Models\Region::all() as $region)--}}
{{--                                    <option value="{{$region->id}}">{{$region->name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            @error('region_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="district_id" class="col-form-label col-lg-2">الحى</label>
                        <div class="col-12 col-lg-4">
                            <select name="district_id" id="district_id"
                                    class="form-control {{$errors->has('district_id') ? ' is-invalid' : null}}">
                                <option selected disabled>اختر الحى</option>
{{--                                @foreach(\App\Models\District::all() as $district)--}}
{{--                                    <option value="{{$district->id}}">{{$district->name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            @error('district_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="street" class="col-form-label col-lg-2">الشارع</label>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="street" placeholder="الشارع"
                                   class="form-control {{$errors->has('street') ? ' is-invalid' : null}}">
                            @error('street')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="house_num" class="col-form-label col-lg-2">رقم المنزل</label>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="house_num" placeholder="رقم المنزل"
                                   class="form-control {{$errors->has('house_num') ? ' is-invalid' : null}}">
                            @error('house_num')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="address" class="col-form-label col-lg-2">تفاصيل العنوان</label>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="address" placeholder="تفاصيل العنوان"
                                   class="form-control {{$errors->has('address') ? ' is-invalid' : null}}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    {{--                </div>--}}

                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="المدينة">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>المدينة</label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="المنطقة">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>المنطقة</label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="الحى">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>الحى</label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="الشارع ">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>الشارع </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="رقم المنزل ">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>رقم المنزل </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-6 col-xs-12">--}}
                    {{--                    <div class="input-wrap">--}}
                    {{--                        <input type="text" placeholder="تفاصيل العنوان ">--}}
                    {{--                        <div class="hov-input">--}}
                    {{--                            <label>تفاصيل العنوان </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <button type="submit" class="btn-hvr"> إضافة عنوان</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/address.js')}}"></script>
@endsection
