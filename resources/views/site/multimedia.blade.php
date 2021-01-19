@extends('site.layout')
@section('title' , 'الصور والفيديوهات | خيط وقطن')
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
<section class="multimedia all-sections">
    <div class="container">
        <div class="row">
            <div class="styled_tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#for-women">الصور </a></li>
                    <li><a data-toggle="tab" href="#for-men">الفيديوهات</a></li>
                </ul>
                <div class="tab-content">
                    <div id="for-women" class="tab-pane fade in active">
                        <div class="theProds">
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-card-wrap">
                                    <div class="img-wrap">
                                        <img class="multimedia-img" src="{{asset('website/img/asset5.jpg')}}">
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <div class="txt-wrap">
                                        <h2>عنوان الصورة</h2>
                                        <p>
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-card-wrap">
                                    <div class="img-wrap">
                                        <img class="multimedia-img" src="{{asset('website/img/asset5.jpg')}}">
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <div class="txt-wrap">
                                        <h2>عنوان الصورة</h2>
                                        <p>
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-card-wrap">
                                    <div class="img-wrap">
                                        <img class="multimedia-img" src="{{asset('website/img/asset5.jpg')}}">
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <div class="txt-wrap">
                                        <h2>عنوان الصورة</h2>
                                        <p>
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-card-wrap">
                                    <div class="img-wrap">
                                        <img class="multimedia-img" src="{{asset('website/img/asset5.jpg')}}">
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <div class="txt-wrap">
                                        <h2>عنوان الصورة</h2>
                                        <p>
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-card-wrap">
                                    <div class="img-wrap">
                                        <img class="multimedia-img" src="{{asset('website/img/asset5.jpg')}}">
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <div class="txt-wrap">
                                        <h2>عنوان الصورة</h2>
                                        <p>
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="for-men" class="tab-pane fade">
                        <div class="theProds">
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-video-wrap">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7LhODuqDGPY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <h2>عنوان الفيديو</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-video-wrap">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7LhODuqDGPY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <h2>عنوان الفيديو</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-video-wrap">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7LhODuqDGPY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <h2>عنوان الفيديو</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-video-wrap">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7LhODuqDGPY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <h2>عنوان الفيديو</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="multimedia-video-wrap">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7LhODuqDGPY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <img class="hov-img" src="{{asset('website/img/logo-wh.png')}}">
                                    </div>
                                    <h2>عنوان الفيديو</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
