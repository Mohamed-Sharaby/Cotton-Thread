@extends('dashboard.layouts.layout')
@section('page-title')
    السلايدر
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
                <a href="{{route('admin.sliders.create')}}" class="btn btn-primary mr-3"><i class="icon-add"
                                                                                               style="margin-left: 10px;"></i>
                   اضافة سلايدر</a>
            </div>
            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نص السلايدر</th>
                    <th>الصورة</th>
                    <th class="text-center">{{__('Operations')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $index => $slider)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#{{$slider->id}}">
                                نص السلايدر
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$slider->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel">نص السلايدر</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="white-space: pre-line;
                                                                      overflow-wrap: break-word;
                                                                      text-overflow: ellipsis;">
                                            {{$slider->body}}
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
                            @if($slider->image)
                                <a data-fancybox="gallery" href="{{getImgPath($slider->image)}}">
                                    <img src="{{getImgPath($slider->image)}}" width="70" height="70"
                                         class="img-thumbnail" alt="cat_img">
                                </a>
                            @else {{__('No Image')}} @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                <form
                                    action="{{ route('admin.active', ['id' => $slider->id, 'type' => 'Slider']) }}"
                                    method="post">@csrf
                                    <button type="submit"
                                            class="{{ $slider->is_active ? 'btn btn-success' : 'btn btn-warning' }}">{{ $slider->is_active ? __('Active') : __('Deactivate') }}</button>
                                </form>

                                <a href="{{url(route('admin.sliders.edit',$slider->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                        class="fa fa-edit"></i></a>


                                <form action="{{route('admin.sliders.destroy',$slider->id)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}

                                <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i class="fa fa-trash"></i>
                                </button>
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

