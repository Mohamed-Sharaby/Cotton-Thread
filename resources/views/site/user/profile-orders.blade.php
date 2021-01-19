@extends('site.layout')
@section('title' , 'طلباتي | خيط وقطن')
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
        <li class="breadcrumb-item"><a href="{{url('profile')}}">حسابى</a></li>
        <li class="breadcrumb-item active" aria-current="page">طلباتى</li>
    </ol>
</div>
<!-- /////// ||||||||||||||||||||end breadcrumbs|||||||||||||||||||| ///////// -->
<!-- /////////////////////||||||||||| start my_orders |||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
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
                <tr>
                    <td><b>564321</b></td>
                    <td>15 Nov 2020</td>
                    <td><b>3000 ر.س</b></td>
                    <!------ add class (dlivered) if status is تم التسليم ----->
                    <td><b class="deliverd">تم التسليم</b></td>
                    <td>
                        <div class="flex-r">
                            <a href="{{url('single-order')}}" class="btn-hvr andShow">
                                <p class="opert"><i class="far fa-eye"></i></p>عرض
                            </a>
                            <!-- لو حالة الحجز //تم التسليم// اظهر حذف -->
                            <button type="button" class="btn-hvr remove_order">
                                <p class="opert"><i class="far fa-trash-alt"></i></p>حذف
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>46564</b></td>
                    <td>22 Nov 2020</td>
                    <td><b>2300 ر.س</b></td>
                    <!------ add class (dlivered) if status is قيد التجهيز----->
                    <td><b class="get_ready">قيد التجهيز</b></td>
                    <td>
                        <div class="flex-r">
                            <a href="{{url('single-order')}}" class="btn-hvr andShow">
                                <p class="opert"><i class="far fa-eye"></i></p>عرض
                            </a>
                            <!-- لو حالة الحجز //قيد التجهيز// اظهر إلغاء -->
                            <button type="button" data-toggle="modal" data-target="#returnsModal" class="btn-hvr andCancel">
                                <p class="opert"><i class="fas fa-power-off"></i></p>إلغاء
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>46564</b></td>
                    <td>22 Nov 2020</td>
                    <td><b>2300 ر.س</b></td>
                    <!------ add class (dlivered) if status is تم الشحن---->
                    <td><b class="charged">تم الشحن</b></td>
                    <td>
                        <div class="flex-r">
                            <a href="{{url('single-order')}}" class="btn-hvr andShow">
                                <p class="opert"><i class="far fa-eye"></i></p>عرض
                            </a>
                            <!-- لو حالة الحجز //تم التسليم// اظهر حذف -->
                            <button type="button" class="btn-hvr remove_order">
                                <p class="opert"><i class="far fa-trash-alt"></i></p>حذف
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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
    $(document).ready(function() {
        $('.datatable').DataTable({
            responsive: true
        });
    });
</script>
<!---- remove an order item --->
<script>
    $(".remove_order").click(function() {
        $(this).parents("tr").fadeOut(300);
    });
</script>
@endsection
