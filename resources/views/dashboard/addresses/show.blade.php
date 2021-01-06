@extends('dashboard.layouts.layout')
@section('page-title')
    عناوين العميل -  {{$user->name}}
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.addresses.index')}}" class="breadcrumb-item">عناوين العملاء</a>
                    <span class="breadcrumb-item active">@yield('page-title')</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- Content area -->
    <div class="content">
        <!-- Basic initialization -->
        <div class="panel panel-flat">
            <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
                تم حذف العنوان بنجاح
            </p>
            <table class="table datatable-button-init-basic table-hover table-responsive display nowrap text-center"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="font-weight-bold">اسم العنوان</th>
                    <th class="font-weight-bold">رقم الجوال</th>
                    <th class="font-weight-bold">التفاصيل</th>
                    <th class="font-weight-bold">الموقع على الخريطة</th>
                    <th class="font-weight-bold">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->addresses as $index => $address)
                    <tr class="address{{$address->id}}">
                        <td>{{$index +1}}</td>
                        <td>{{$address->name ?? __('Not Found')}}</td>
                        <td>{{$address->phone ?? __('Not Found')}}</td>
                        <td>@include('dashboard.addresses.details')</td>

                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info show-map" data-lat="{{$address->lat}}"
                                    data-lng="{{$address->lng}}">
                                الموقع على الخريطة
                            </button>
                        </td>

                        <td class="text-center">
                            <a class="btn btn-danger btn-sm del_address" data-id="{{$address->id}}">
                                <i class="fa fa-trash text-white"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('dashboard.addresses.map')

        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
@endsection
@section('my-js')
    <script async>

        var lat = '26.348180';
        var lng = '43.955276';

        var geocoder;
        var map;
        var marker;

        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            //var uluru = {lat: 26.381861087 , lng: 43.994796800 };
            var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)};
            // The map, centered at Uluru
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            // The marker, positioned at Uluru
            marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true,
            });
        }


        $(document).ready(function () {
            ;

            $('.show-map').click(function () {
                lat = $(this).data('lat'), lng = $(this).data('lng')
                initMap();
                $('#mapModal').modal('show');
            })


            $(document).on('click', '.del_address', function (e) {
                let confirmResult = confirm('هل أنت متأكد من حذف هذا العنوان');
                if (confirmResult) {
                    var id = $(this).data("id");
                    $.ajax({
                        type: 'delete',
                        url: "/dashboard/delete/address/" + id,
                        data: {
                            '_token': '{{csrf_token()}}',
                            'id': id,
                        },
                        success: function (data) {

                            $('.msg').css('display', 'block');
                            $('.address' + data.id).remove();
                        }
                    });
                } else {
                    e.preventDefault();
                }
            });
        });

    </script>

    {{--////////////////////////// location on map //////////////////////////////////--}}
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsT140mx0UuES7ZwcfY28HuTUrTnDhxww&callback=initMap">
    </script>
@endsection


