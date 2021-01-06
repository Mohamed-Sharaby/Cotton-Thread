@extends('dashboard.layouts.layout')
@section('page-title')
أحجام المنتج
@endsection
@section('content')
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex mr-auto">
            <div class="breadcrumb">
                <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    {{__('Main')}}</a>
                <a href="{{route('admin.products.index')}}" class="breadcrumb-item">{{__('Products')}}</a>
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
            <a href="{{route('admin.products.add_size',$product->id)}}" class="btn btn-primary mr-3"><i class="icon-add"
                    style="margin-left: 10px;"></i>
               اضافه حجم للمنتج</a>
        </div>
        {{-- {{$dataTable->table(['class'=>'table-1 responsive datatable-ajax table-hover  display nowrap'])}} --}}
        <table class="table datatable-button-init-basic table-hover table-responsive display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الحجم</th>
                    <th class="text-center">{{__('Operations')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sizes as $size)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$size->size}}</td>

                    <td class="text-center">
                        <div class="btn-group text-center">

                            <a href="{{url(route('admin.products.add_quantity',$size->id))}}"
                               class="btn btn-primary btn-sm ml-2 "><i class="fa fa-plus mr-2"></i>اضافة كمية</a>


{{--                            <form action="{{route('admin.products.destroy_size',$size->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                {{method_field('delete')}}--}}

{{--                            <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i--}}
{{--                                    class="fa fa-trash"></i></button>--}}
{{--                            </form>--}}

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

