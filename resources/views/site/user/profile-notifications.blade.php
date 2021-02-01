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
                    <button type="button" class="rmv_all delete-notification">حذف جميع الإشعارات</button>
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
                                                    <b>{{isset($notify->data['title']) ? $notify->data['title'] : ''}} {{$notify->data['type'] == 'cart_status' ? 'رقم -'.$notify->data['cart_id'] : ''}}</b>
                                                    {{isset($notify->data['body']) ? $notify->data['body'] : ''}}
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
    <script>
        $(".rmv_all").click(function () {
            $(this).parents(".notification_wrapper").find(".notification").fadeOut(500);
            $(this).fadeOut(500);
        });


        $(".delete-notification").click(function (e) {
            //$(this).closest(".notifi1").fadeOut(500);
                e.preventDefault();
                let current = $(this);
                let id = current.data('id');
                $.ajax({
                    url: "{{ url('user/notifications-destroy') }}/"+id,
                    type: 'delete',
                    success(response) {
                        current.parents(".notifi1").fadeOut();
                        toastr.success("تم الحذف بنجاح");
                    },
                    error(error) {
                        toastr.error(error);
                    }
                })
        });



        $(".read-now").attr('title', 'تحديد كمقروء').click(function () {
            $(this).closest(".notifi1").toggleClass("not-read", 700)
            $(this).toggleClass('check-read');
            var title = 'تحديد كمقروء';
            if ($(this).hasClass('check-read')) {
                title = 'تحديد كغير مقروء';
            }
            $(this).attr('title', title);
        });
    </script>
@endsection
