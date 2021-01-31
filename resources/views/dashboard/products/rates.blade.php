@extends('dashboard.layouts.layout')
@section('page-title')
التعليقات والتقييمات
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

        <div class="panel-heading">
            <h3 class="panel-title">عرض تعليقات وتقييمات المنتج
                <span class="badge badge-info">{{$product->name}}</span>
            </h3>
        </div>
        {{-- {{$dataTable->table(['class'=>'table-1 responsive datatable-ajax table-hover  display nowrap'])}} --}}
        <table class="table datatable-button-init-basic table-hover table-responsive display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم العميل</th>
                    <th>نص التعليق</th>
                    <th>التقييم</th>
                    <th>تاريخ التقييم</th>
                    <th class="text-center">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rates as $rate)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$rate->user->name}}</td>
                    <td>{{$rate->comment}}</td>
                    <td>{{$rate->rate}}</td>
                    <td>{{$rate->created_at->format('Y.m.d')}}</td>

                    <td class="text-center btn-group">

                        <form
                            action="{{ route('admin.active', ['id' => $rate->id, 'type' => 'RateComment']) }}"
                            method="post">@csrf
                            <button type="submit"
                                    class="{{ $rate->is_ban ? 'btn btn-sm btn-warning' : 'btn btn-sm btn-success' }}">{{ $rate->is_ban ? 'غير مفعل' : ' مفعل' }}</button>
                        </form>

                        <button data-url="{{route('admin.products.destroy_rate',$rate->id)}}"
                                class="btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>

        $(document).ready(function() {
            ;
        } );
    </script>
@endsection

