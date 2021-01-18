@extends('dashboard.layouts.layout')
@section('page-title')
    عناوين العملاء
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
            <table class="table datatable-button-init-basic table-hover table-responsive display nowrap text-center"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم العميل</th>
                    <th>العناوين</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$user->name ?? __('Not Found')}}</td>
                        <td>
                            @if(count($user->addresses) > 0)
                            <div class=" text-center">
                                <a href="{{url(route('admin.addresses.show',$user->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                        class="fa fa-eye"></i></a>
                            </div>
                            @else      لا يوجد       @endif
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


{{--    <script async>--}}
{{--        $(document).on('click', '.del_address', function (e) {--}}
{{--            let confirmResult = confirm('هل أنت متأكد من حذف هذا العنوان');--}}
{{--            if (confirmResult) {--}}
{{--                var id = $(this).data("id");--}}
{{--                $.ajax({--}}
{{--                    type: 'delete',--}}
{{--                    url: "/dashboard/delete/address/"+id,--}}
{{--                    data: {--}}
{{--                        '_token': '{{csrf_token()}}',--}}
{{--                        'id': id,--}}
{{--                    },--}}
{{--                    success: function (data) {--}}

{{--                        $('.msg').css('display','block');--}}
{{--                        $('.address'+data.id).remove();--}}
{{--                    }--}}
{{--                });--}}
{{--            } else {--}}
{{--                e.preventDefault();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection


