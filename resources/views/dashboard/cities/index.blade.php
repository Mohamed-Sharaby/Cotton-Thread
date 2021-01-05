@extends('dashboard.layouts.layout')
@section('page-title')
    المدن
@endsection
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
        <!-- Basic initialization -->
        <div class="panel panel-flat">
            @include('dashboard.layouts.status')

                <div class="panel-body mb-2">
                    <a href="{{route('admin.cities.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                               style="margin-left: 10px;"></i>
                        اضافة مدينة </a>
                </div>

            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم بالعربية</th>
                    <th>الاسم بالانجليزية</th>
                    <th class="text-center">العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $index => $city)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$city->ar_name}}</td>
                        <td>{{$city->en_name}}</td>
                        <td class="text-center">
                            <div class="btn-group text-center">

                                    <a href="{{url(route('admin.cities.edit',$city->id))}}"
                                       class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-edit"></i></a>


                                <form action="{{route('admin.cities.destroy',$city->id)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}
                                    <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-trash"></i></button>
                                </form>


                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
@endsection
@section('my-js')
@endsection

