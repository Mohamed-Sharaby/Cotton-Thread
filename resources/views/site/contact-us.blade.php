@extends('site.layout')
@section('title' , 'اتصل بنا | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
    </ol>
</div>
<section class="contact-us all-sections" id="contact">
    <div class="container">
        <div class="row">
            <div id="map"></div>
            <div class="contact-wrap">
                <div class="text-center"></div>
                <div class="col-md-6 col-xs-12">
                    <div class="contact-right">
                        <div class="contact-data">
                            <h1><i class="fas fa-map-marker-alt"></i> العنوان </h1>
                            <p> {{$location->value}}</p>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-phone-volume"></i> رقم الهاتف </h1>
                            <a href="tel:{{$phone->value}}"> {{$phone->value}}</a>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-mobile-alt"></i> الجوال </h1>
                            <a href="tel:{{$mobile->value}}">{{$mobile->value}} </a>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-envelope"></i> البريد الالكترونى </h1>
                            <a href="mailto:{{$email->value}}">ِ{{$email->value}}</a>
                        </div>
                        <ul class="social">
                            @foreach(\App\Models\Setting::whereType('url')->get() as $link)
                                @if($link->name == 'facebook')

                                    <li><a href="{{$link->value}}" target="_blank" class="icon-f"><i
                                                class="fab fa-facebook"></i></a></li>
                                @endif
                                @if($link->name == 'google')
                                    <li><a href="{{$link->value}}" target="_blank" class="icon-g"><i
                                                class="fab fa-google-plus-g"></i></a></li>
                                @endif
                                @if($link->name == 'twitter')
                                    <li><a href="{{$link->value}}" target="_blank" class="icon-tw"><i
                                                class="fab fa-twitter"></i></a></li>
                                @endif
                                @if($link->name == 'instagram')
                                    <li><a href="{{$link->value}}" target="_blank" class="icon-ig"><i
                                                class="fab fa-instagram"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">

                    <div class="  msg" style="display: none;">
                        <div class="alert alert-success alert-dismissable  " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="m-0 text-center">{{__('Message Sent Successfully')}}</p>
                        </div>
                    </div>
                    <p class="error text-center" style="margin-right: 100px;margin-left: 100px;"></p>


                    <div class="form-left-k">
                        <form id="send_message_form" >
                            @csrf

                            <div class="form__group field">
                                <input type="text" class="form__field" placeholder="الاسم" name="name" id='name' required
                                       oninvalid="this.setCustomValidity('{{__('Name Required')}}')"
                                       onchange="this.setCustomValidity('')"/>
                                <label for="name" class="form__label">الاسم</label>
                            </div>
                            <div class="form__group field">
                                <input type="email" class="form__field" placeholder="البريد الالكترونى" name="email" id='mail' required
                                       oninvalid="this.setCustomValidity('{{__('Email Required')}}')"
                                       onchange="this.setCustomValidity('')"/>
                                <label for="mail" class="form__label">البريد الإلكترونى</label>
                            </div>
                            <div class="form__group field">
                                <input type="text" class="form__field" placeholder="الجوال" name="phone" id='phone' required
                                       oninvalid="this.setCustomValidity('{{__('Phone Required')}}')"
                                       onchange="this.setCustomValidity('')"/>
                                <label for="phone" class="form__label">الجوال</label>
                            </div>
                            <textarea placeholder="رسالتك" required name="message"
                                      oninvalid="this.setCustomValidity('{{__('Content Required')}}')"
                                      onchange="this.setCustomValidity('')">{{old('message')}}</textarea>
                            <button  class="btn-hvr" id="send_message_btn">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/contact.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF-7f4KwYdJHXqb4DFU5q341ry19VnnGg&callback=initMap" async defer></script>
<script>
    function initMap() {
        var myLatLng = {
            lat: 21.388869,
            lng: 39.707132
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: myLatLng
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'printing',
            icon: 'img/marker.png'
        });
    }
</script>
@endsection
