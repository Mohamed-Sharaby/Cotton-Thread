@extends('dashboard.layouts.layout')
@section('page-title')
    الفروع
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
                <a href="{{route('admin.branches.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                             style="margin-left: 10px;"></i>
                    اضافة فرع</a>
            </div>

            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>رقم الجوال</th>
                    <th class="text-center">العمليات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($branches as $index => $branch)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$branch->name}}</td>
                        <td>{{$branch->phone ?? __('Not Found')}}</td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                <form
                                    action="{{ route('admin.active', ['id' => $branch->id, 'type' => 'Branch']) }}"
                                    method="post">@csrf
                                    <button type="submit"
                                            class="{{ $branch->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $branch->is_active ? 'مفعل' : 'غير مفعل' }}</button>
                                </form>


                                <div class=" text-center">
                                    <a href="{{url(route('admin.branches.edit',$branch->id))}}"
                                       class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-edit"></i></a>
                                </div>

                                <form action="{{route('admin.branches.destroy',$branch->id)}}" method="post">
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

    <script async src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script async src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <!-- <script async>

      $(document).ready(function() {
        ;
    } );
    </script> -->
@endsection
