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
                            <p> السعودية-القصيم-طريق الملك فهد</p>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-phone-volume"></i> رقم الهاتف </h1>
                            <a href="tel:999488477465534"> +999488477465534</a>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-mobile-alt"></i> الجوال </h1>
                            <a href="tel:00488477465534">00488477465534 </a>
                        </div>
                        <div class="contact-data">
                            <h1><i class="fas fa-envelope"></i> البريد الالكترونى </h1>
                            <a href="mailto:Admin@admin.com">ِAdmin@admin.com</a>
                        </div>
                        <ul class="social">
                            <li><a href="www.facebook.com" target="_blank" class="icon-f"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="www.google.com" target="_blank" class="icon-g"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="www.twitter.com" target="_blank" class="icon-tw"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="www.instagram.com" target="_blank" class="icon-ig"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-left-k">
                        <form action="{{url('safety/contact-us')}}" method="post">
                            <div class="form__group field">
                                <input type="text" class="form__field" placeholder="الاسم" id='name' required />
                                <label for="name" class="form__label">الاسم</label>
                            </div>
                            <div class="form__group field">
                                <input type="email" class="form__field" placeholder="البريد الالكترونى" name="email" id='mail' required />
                                <label for="mail" class="form__label">البريد الإلكترونى</label>
                            </div>
                            <div class="form__group field">
                                <input type="text" class="form__field" placeholder="الجوال" id='number' required />
                                <label for="phone" class="form__label">الجوال</label>
                            </div>
                            <textarea placeholder="رسالتك" required name="content"></textarea>
                            <button type="submit" class="btn-hvr">ارسال</button>
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
