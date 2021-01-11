@extends('dashboard.layouts.layout')
@section('page-title')
    المديرين
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
                <a href="{{route('admin.admins.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                           style="margin-left: 10px;"></i>
                    اضافة مدير</a>
            </div>

            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الالكترونى</th>
                    <th>رقم الجوال</th>
                    <th>المنصب</th>
                    <th class="text-center">العمليات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($admins as $index => $admin)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->phone}}</td>
                        <td>
                            @if($admin->hasRole(\Spatie\Permission\Models\Role::all()))
                                @foreach($admin->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            @else لا يوجد @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                @if(!$admin->hasRole('Super Admin'))
                                    @if(auth()->id() != $admin->id)

                                        @if($role->is_active == 0)
                                            <button disabled="disabled" class="btn btn-sm btn-warning disabled">المنصب
                                                معطل
                                            </button>
                                        @else
                                            <form
                                                action="{{ route('admin.active', ['id' => $admin->id, 'type' => 'Admin']) }}"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="{{ $admin->is_ban ? 'btn btn-sm btn-warning' : 'btn btn-sm btn-success' }}">{{ $admin->is_ban ? 'غير مفعل' : ' مفعل' }}</button>
                                            </form>
                                        @endif
                                    @else
                                        <button disabled class="btn btn-sm btn-success">مفعل</button>
                                    @endif
                                @else
                                    <button disabled="disabled"
                                            class="btn btn-sm btn-success">مفعل
                                    </button>
                                @endif

                                {{--                                    @if(!$admin->hasRole('Super Admin') || auth()->user()->id == 1)--}}
                                <div class=" text-center">
                                    <a href="{{url(route('admin.admins.edit',$admin->id))}}"
                                       class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                                {{--                                    @else--}}
                                {{--                                        <button disabled class="btn btn-primary btn-sm ml-2 rounded-circle"><i class="fa fa-edit"></i>--}}
                                {{--                                        </button>--}}
                                {{--                                    @endif--}}




                                @if(!$admin->hasRole('Super Admin'))

{{--                                    <form action="{{route('admin.admins.destroy',$admin->id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        {{method_field('delete')}}--}}
{{--                                        <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i--}}
{{--                                                class="fa fa-trash"></i></button>--}}
{{--                                    </form>--}}
                                        <button data-url="{{route('admin.admins.destroy',$admin->id)}}"
                                                class="btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                @else
                                    <button disabled class="btn btn-danger btn-sm ml-2 rounded-circle"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                @endif

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
