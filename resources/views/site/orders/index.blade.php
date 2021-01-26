@extends('site.layout')
@section('title' , 'طلباتي || خيط وقطن')
@section('styles')
    <!-- start datatable -->
    <link rel="stylesheet" href="{{asset('website/css/Datatable/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/Datatable/responsive.dataTables.min.css')}}">
    <!-- end datatable -->
@endsection
@section('content')
    <!-- /////////////////////||||||||||| bread crumbs |||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item active" aria-current="page">طلباتى</li>
        </ol>
    </div>
    <!-- /////// ||||||||||||||||||||end breadcrumbs|||||||||||||||||||| ///////// -->
    <!-- /////////////////////||||||||||| start my_orders |||||||||||||||||||| -->
    <section class="all-sections">
        <div class="container">
            @include('dashboard.layouts.status')
            <table class="datatable display nowrap">
                <thead>
                <tr>
                    <th>رقم الطلب.</th>
                    <th>تاريخ الطلب</th>
                    <th>إجمالى مبلغ الطلب</th>
                    <th>حالة الطلب</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><b>{{$order->id}}</b></td>
                        <td>{{$order->created_at}}</td>
                        <td><b>
                                @if($order->coupon_id)
                                    {{number_format(($order->totalProductsPrice + $order->totalProductsPrice * (getSetting('tax_percentage') / 100) ) - ($order->totalProductsPrice * $order->coupon->discount / 100),2)}}
                                    ريال
                                @else
                                    {{number_format(($order->totalProductsPrice + $order->totalProductsPrice * (getSetting('tax_percentage') / 100)),2) }}
                                    ريال
                                @endif
                            </b></td>
                        <!------ add class (dlivered) if status is تم التسليم ----->
                        <td><b class="{{$order->status == 'finished' ? 'deliverd' : ''}}">{{__($order->status)}} </b>
                        </td>

                        <td>
                            <div class="flex-r">
                                <a href="{{route('website.orders.show', $order->id)}}" class="btn-hvr andShow">
                                    <p class="opert"><i class="far fa-eye"></i></p>عرض
                                </a>
                                <!-- لو حالة الحجز //تم التسليم// اظهر حذف -->
                                @if($order->status == 'finished'  || $order->status == 'canceled')
                                    <button type="button" class="btn-hvr remove_order" data-url="{{ route('website.orders.delete', $order->id) }}">
                                        <p class="opert"><i class="far fa-trash-alt"></i></p>حذف
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p class="pagination">{!! $orders->links() !!}</p>
        </div>
    </section>
    <!-- /////////////////////|||||||||||End my_orders |||||||||||||||||||| -->
    @include('site.modals.returns-modal')
@endsection
@section('scripts')
    <!----- datatable init---->
    <script src="{{asset('website/js/Datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('website/js/Datatable/dataTables.responsive.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                responsive: true
            });
        });
    </script>
    <!---- remove an order item --->
    <script src="{{asset('website/js/user/order.js')}}"></script>
{{--    <script>--}}
{{--        $(".remove_order").click(function () {--}}
{{--            $(this).parents("tr").fadeOut(300);--}}
{{--        });--}}
{{--    </script>--}}
@endsection
