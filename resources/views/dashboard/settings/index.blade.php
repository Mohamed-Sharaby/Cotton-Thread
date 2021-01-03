@extends('dashboard.layouts.layout')

@section('page-title')
    الاعدادات
@endsection
@inject('model','App\Models\Setting')
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <span class="breadcrumb-item active">@yield('page-title')</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">
        <!-- Form horizontal -->
        <div class="panel panel-flat">
            @include('dashboard.layouts.status')
            <div class="panel-body">

                <table class="table datatable-button-init-basic table-hover responsive  table-responsive display nowrap"
                       style="width:100%">
                    <thead>

                    <tr>
                        <th>اسم الصفحة</th>
                        <th class="text-center">عرض</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $index => $page)
                        <tr>
                            <td>{{$page}}</td>
                            <td class="text-center">
                                <div class="btn-group text-center">
                                    <a href="{{url(route('admin.settings.show',$page))}}"
                                       class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection
@section('my-js')

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>

        $(document).ready(function() {
            ;
        } );
    </script>
@endsection
