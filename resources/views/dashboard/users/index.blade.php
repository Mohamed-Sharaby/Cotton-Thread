@extends('dashboard.layouts.layout')
@section('page-title')
    العملاء
@endsection
@section('content')
    <div class="page-header page-header-light ">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline ">
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
                <a href="{{route('admin.users.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                          style="margin-left: 10px;"></i>
                    اضافة عميل</a>
            </div>

            <table class="table datatable-button-init-basic table-hover responsive  table-responsive display nowrap"
                   style="width:100%">
                <thead>

                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th> البريد الالكترونى</th>
                    <th>رقم الجوال</th>
                    <th>الصورة</th>
                    <th class="text-center">العمليات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone ?? __('Not Found')}}</td>
                        <td class="text-center">
                            @if($user->image)
                                <a data-fancybox="gallery" href="{{$user->image}}">
                                    <img src="{{$user->image}}" width="70" height="70"
                                         class="img-thumbnail">
                                </a>
                            @else   لا يوجد صورة  @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group text-center">

                                @if(auth('web')->id() != $user->id)
                                    <form
                                        action="{{ route('admin.active', ['id' => $user->id, 'type' => 'User']) }}"
                                        method="post">@csrf
                                        <button type="submit"
                                                class="{{ $user->is_ban ? 'btn btn-sm btn-warning' : 'btn btn-sm btn-success' }}">{{ $user->is_ban ? 'غير مفعل' : ' مفعل' }}</button>
                                    </form>
                                @endif

                                <a href="{{url(route('admin.users.edit',$user->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                        class="fa fa-edit"></i></a>


{{--                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    {{method_field('delete')}}--}}
{{--                                    <button class="btn btn-danger btn-sm ml-2 rounded-circle">--}}
{{--                                        <i class="fa fa-trash"></i></button>--}}
{{--                                </form>--}}
                                    <button data-url="{{route('admin.users.destroy',$user->id)}}"
                                            class="btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>

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

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>

        $(document).ready(function () {
            ;
        });
    </script>
@endsection
