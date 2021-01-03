@extends('dashboard.layouts.layout')
@section('page-title')
    مبيعات الجملة
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

            {{--            <div class="panel-body mb-2">--}}
            {{--                <a href="{{route('admin.sales.create')}}" class="btn btn-primary mr-3"><i class="icon-add"--}}
            {{--                                                                                               style="margin-left: 10px;"></i>--}}
            {{--                   اضافة خدمة</a>--}}
            {{--            </div>--}}
            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المحتوى</th>
                    <th>الصور</th>
                    <th>الجوال</th>
                    <th class="text-center">{{__('Operations')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $index => $sale)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{\Illuminate\Support\Str::limit($sale->content,20)}}</td>

                        <td class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#{{$sale->id}}">
                                الصور
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$sale->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel"> الصور </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="white-space: pre-line;
                                                                      overflow-wrap: break-word;
                                                                      text-overflow: ellipsis;">
                                           <div class="row">
                                                   @if(!blank($sale->sale_images))
                                                       @foreach($sale->sale_images as $image)
                                                       <div class="col-md-4">
                                                           <a data-fancybox="gallery" href="{{getImgPath($image->image)}}">
                                                               <img src="{{getImgPath($image->image)}}" width="140" height="140" class="img-thumbnail">
                                                           </a>
                                                       </div>
                                                       @endforeach
                                                   @else   {{__('No Image')}}  @endif
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
                        <td>{{$sale->phone}}</td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                <a href="{{url(route('admin.sales.edit',$sale->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                        class="fa fa-edit"></i></a>


                                {{--                                <form action="{{route('admin.services.destroy',$service->id)}}" method="post">--}}
                                {{--                                    @csrf--}}
                                {{--                                    {{method_field('delete')}}--}}

                                {{--                                <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i class="fa fa-trash"></i>--}}
                                {{--                                </button>--}}
                                {{--                                </form>--}}

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

