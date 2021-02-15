@extends('site.layout')
@section('title' , 'الإشعارات || خيط وقطن')
@section('styles')
@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item active" aria-current="page">الإشعارات</li>
        </ol>
    </div>
    <section class="all-sections">
        <div class="container">
            <div class="notification_wrapper">
                <div class="flexx notif_top">
                    <h4 class="notif_title">الإشعارات</h4>
                    <button type="button" class="rmv_all delete-all-notifications">حذف جميع الإشعارات</button>
                </div>
                @if(count($notifications) > 0)
                <div class="notification">
                    <div class="row">
                            @foreach($notifications as $notify)
                                <div class="col-xs-12">
                                    <div class="notifi1 {{is_null($notify->read_at) ? 'not-read' : ''}}">
                                        <a href="#" class="notif_inn">
                                            <div class="the_bell"><i class="fas fa-bell"></i></div>
                                            <div class="notif_body">
                                                <p>
                                                    <b>
                                                        {{$notify->type == 'cart_status_changed' ? (app()->getLocale() == 'ar' ? $notify->data['ar_title'] : $notify->data['en_title']) : ''}}
                                                        {{$notify->type == 'general_notification' ? (app()->getLocale() == 'ar' ? $notify->data['ar_name'] : $notify->data['en_name']) : ''}}
                                                    </b>
                                                    {{$notify->type == 'cart_status_changed' ? (app()->getLocale() == 'ar' ? $notify->data['ar_body'] : $notify->data['en_body']) : ''}}
                                                    {{$notify->type == 'general_notification' ? (app()->getLocale() == 'ar' ? $notify->data['ar_desc'] :$notify->data['en_desc']) : ''}}
                                                </p>
                                                <span class="time">{{$notify->created_at->format('Y-m-d')}}</span>
                                            </div>
                                            <div class="controls1">
                                                <button class="read-now" title="تحديد كمقروء"><i
                                                        class="fas fa-circle"></i></button>
                                                <button title="حذف من الاشعارات" class="close delete-notification"
                                                        data-id="{{ $notify->id }}" href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
                @else
                    <p class="alert alert-danger text-center">لا يوجد </p>
                @endif
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p>{!! $notifications->links() !!}</p>
                </div>
            </div>
        </div>

    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/user-notifications.js')}}"></script>
@endsection
