@extends('dashboard.layouts.layout')
@section('page-title')
    الصلاحيات والمناصب
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
                <a href="{{route('admin.roles.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                          style="margin-left: 10px;"></i>
                    اضافة منصب</a>
            </div>

            <table class="table datatable-button-init-basic responsive table-hover table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المنصب</th>
                    <th> الصلاحيات</th>
                    <th class="text-center">العمليات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($roles as $index => $role)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#item{{$role->id}}">
                                عرض الصلاحيات
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="item{{$role->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="item{{$role->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger-300">
                                            <h5 class="modal-title"
                                                id="exampleModalScrollableTitle">قائمة الصلاحيات</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <div class="row">
                                                @if(count($role->permissions))
                                                    @foreach($role->permissions as $permission)
                                                        <div class="col-sm-4">
                                                            <ul>
                                                                <li>{{$permission->ar_name}}</li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    لا يوجد صلاحيات
                                                @endif
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                @if(!$role->hasAllPermissions(\Spatie\Permission\Models\Permission::all()))
                                    @if( !auth()->user()->hasRole($role))
                                        <form action="{{ route('admin.active.role', ['id' => $role->id]) }}"
                                              method="post">@csrf
                                            <button type="submit"
                                                    class="{{ $role->is_active ? 'btn btn-success' : 'btn btn-warning' }}">{{ $role->is_active ? 'مفعل' : 'غير مفعل' }}</button>
                                        </form>
                                    @else
                                        <button disabled class="btn btn-success">مفعل</button>
                                    @endif
                                @else
                                    <button disabled class="btn btn-success">مفعل</button>
                                @endif

{{--                                @if(!$role->hasAllPermissions(\Spatie\Permission\Models\Permission::all()))--}}
                                    @if(!auth()->user()->hasRole($role))
                                        <a href="{{route('admin.roles.edit',$role->id)}}"
                                           class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                class="fa fa-edit"></i></a>
                                    @endif
{{--                                @endif--}}


                                @if(!$role->hasAllPermissions(\Spatie\Permission\Models\Permission::all()))
                                    @if( !auth()->user()->hasRole($role))
{{--                                        {!! Form::open([--}}
{{--                                                        'action' => ['Admin\RoleController@destroy',$role->id],--}}
{{--                                                        'method' => 'delete'--}}
{{--                                                        ]) !!}--}}
                                            <form action="{{route('admin.roles.destroy',$role->id)}}" method="post">
                                                {{method_field('delete')}}
                                                @csrf

                                        <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i
                                                class="fa fa-trash"></i></button>
                                            </form>
{{--                                        {!! Form::close() !!}--}}
                                    @else
                                        <button class="btn btn-danger btn-sm ml-2 rounded-circle" disabled><i
                                                class="fa fa-trash"></i>
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-danger btn-sm ml-2 rounded-circle" disabled><i
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
<!--
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script> -->
<script>

  $(document).ready(function() {
    ;
} );
</script>
@endsection
