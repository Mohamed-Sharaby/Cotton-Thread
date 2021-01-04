@extends('dashboard.layouts.layout')
@section('page-title')
    لوحة التحكم |  خيط وقطن
@endsection

@section('content')

    <div class="content">
        <div class="row">
            @can('Roles')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.roles.index')}}">
                        <div class="card shadow shadow-md bg-primary p-1">
                            <i class="icon-law icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                {{__('Roles')}}
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\Spatie\Permission\Models\Role::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

            @can('Admins')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.admins.index')}}">
                        <div class="card shadow shadow-md bg-warning p-1">
                            <i class="icon-users icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                {{__('Admins')}}
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Admin::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan



{{--            @can('GuestMessages')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.guest-messages.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-danger-800">--}}
{{--                            <i class="icon-comment-discussion icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                رسائل الزوار--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\GuestMessage::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

{{--            @can('Products')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.products.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-info-800">--}}
{{--                            <i class="icon-server icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                المنتجات--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Product::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

{{--            @can('Services')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.services.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-teal-300">--}}
{{--                            <i class="icon-database icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                الخدمات--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Service::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

{{--            @can('Sales')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.sales.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-brown-600">--}}
{{--                            <i class="icon-cart-add icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                مبيعات الجملة--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Sale::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

{{--            @can('Settings')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.settings.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-primary-700">--}}
{{--                            <i class="icon-cog icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                الإعدادات--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Setting::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

{{--            @can('Branches')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.branches.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-green-800">--}}
{{--                            <i class="icon-cog icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                الفروع--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Branch::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                @endcan--}}

        </div>
    </div>
@endsection
