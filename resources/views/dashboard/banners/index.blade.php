@extends('dashboard.layouts.layout')
@section('page-title')
    البانرات
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

            <div class="panel-body mb-2">
                <a href="{{route('admin.banners.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                            style="margin-left: 10px;"></i>
                    اضافة بانر</a>
            </div>
            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>تفاصيل البانر</th>
                    <th>الصورة</th>
                    <th class="text-center">{{__('Operations')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $index => $banner)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#{{$banner->id}}">
                                تفاصيل البانر
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$banner->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel">تفاصيل البانر</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="bg-danger text-center">المحتوى بالعربية</h4>
                                                    <p style="white-space: pre-line;overflow-wrap: break-word;text-overflow: ellipsis;">{{$banner->ar_details}}</p>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="bg-danger text-center">المحتوى بالانجليزية</h4>
                                                    <p style="white-space: pre-line;overflow-wrap: break-word;text-overflow: ellipsis;">{{$banner->en_details}}</p>
                                                </div>
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
                        <td>
                            @if($banner->image)
                                <a data-fancybox="gallery" href="{{$banner->image}}">
                                    <img src="{{$banner->image}}" width="70" height="70"
                                         class="img-thumbnail" alt="cat_img">
                                </a>
                            @else {{__('No Image')}} @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                <form
                                    action="{{ route('admin.active', ['id' => $banner->id, 'type' => 'Banner']) }}"
                                    method="post">@csrf
                                    <button type="submit"
                                            class="{{ $banner->is_ban ? 'btn btn-warning' : 'btn btn-success' }}">{{ $banner->is_ban ? __('Deactivate') : __('Active') }}</button>
                                </form>

                                <a href="{{url(route('admin.banners.edit',$banner->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                        class="fa fa-edit"></i></a>


{{--                                <form action="{{route('admin.banners.destroy',$banner->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    {{method_field('delete')}}--}}

{{--                                    <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i--}}
{{--                                            class="fa fa-trash"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                                <button data-url="{{route('admin.banners.destroy',$banner->id)}}"
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
    <script async type="text/javascript"
            src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script async
            src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script async src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script async src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <!-- <script>

      $(document).ready(function() {
        ;
    } );
    </script> -->

@endsection

