@extends('dashboard.layouts.layout')
@section('page-title')
    رسائل الزوار
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
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
            <table class="table datatable-button-init-basic table-hover table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الالكترونى</th>
                    <th> رقم الجوال</th>
                    <th class="text-center"> محتوى الرسالة</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $index => $contact)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$contact->name ?? __('Not Found')}}</td>
                        <td>{{$contact->email ?? __('Not Found')}}</td>
                        <td>{{$contact->phone ?? __('Not Found')}}</td>
                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#{{$contact->id}}">
                                عرض
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$contact->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel">محوى الرسالة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="white-space: pre-line;
                                                                      overflow-wrap: break-word;
                                                                      text-overflow: ellipsis;">
                                            {{$contact->message}}
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
                        <td>{{$contact->created_at->format('Y.m.d')}}</td>
                        <td class="text-center">

                            {{--                            <form action="{{route('admin.guest-messages.destroy',$contact->id)}}" method="post">--}}
                            {{--                                @csrf--}}
                            {{--                                {{method_field('delete')}}--}}

                            {{--                                <button class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i>--}}
                            {{--                                </button>--}}
                            {{--                            </form>--}}
                            <button data-url="{{route('admin.guest-messages.destroy',$contact->id)}}"
                                    class="btn btn-danger rounded-circle btn-sm delete" title="Delete">
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

