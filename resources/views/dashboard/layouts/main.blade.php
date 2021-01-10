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

            @can('Users')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.users.index')}}">
                        <div class="card shadow shadow-md bg-info p-1">
                            <i class="icon-users4 icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                {{__('Users')}}
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\User::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

            @can('Cities')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.cities.index')}}">
                        <div class="card shadow shadow-md bg-danger-400 p-1">
                            <i class="icon-city icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                {{__('Cities')}}
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\City::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan


            @can('Regions')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.regions.index')}}">
                        <div class="card shadow shadow-md bg-pink p-1">
                            <i class="icon-earth icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                المناطق
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Region::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

            @can('Districts')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.districts.index')}}">
                        <div class="card shadow shadow-md bg-brown-400 p-1">
                            <i class="icon-earth icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                الأحياء
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\District::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan


            @can('Categories')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.categories.index')}}">
                        <div class="card shadow shadow-md bg-info-800">
                            <i class="icon-cog7 icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                الاقسام الرئيسية
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Category::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan


            @can('SubCategories')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.sub-categories.index')}}">
                        <div class="card shadow shadow-md bg-indigo-300">
                            <i class="icon-page-break2 icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                الاقسام الفرعية
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\SubCategory::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan


{{--            @can('Galleries')--}}
{{--                <div class="col-12 col-md-3">--}}
{{--                    <a href="{{route('admin.galleries.index')}}">--}}
{{--                        <div class="card shadow shadow-md bg-purple-600">--}}
{{--                            <i class="icon-images3 icon-2x"></i>--}}
{{--                            <div class="card-body text-center m-1 font-weight-bold">--}}
{{--                                مكتبة الصور والفيديو--}}
{{--                            </div>--}}
{{--                            <label class="badge badge-dark"--}}
{{--                                   style="font-size: 14px;">{{\App\Models\Gallery::count()}}</label>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endcan--}}

            @can('GuestMessages')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.guest-messages.index')}}">
                        <div class="card shadow shadow-md bg-danger-800">
                            <i class="icon-comment-discussion icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                رسائل الزوار
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Contact::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

            @can('Products')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.products.index')}}">
                        <div class="card shadow shadow-md bg-info-800">
                            <i class="icon-server icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                المنتجات
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Product::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

            @can('Banners')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.banners.index')}}">
                        <div class="card shadow shadow-md bg-success-600">
                            <i class="icon-server icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                البانرات
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Banner::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan

                @can('Carts')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.carts.index')}}">
                        <div class="card shadow shadow-md bg-danger-800">
                            <i class="icon-cart-add icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                الطلبات
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Cart::count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan



            @can('Settings')
                <div class="col-12 col-md-3">
                    <a href="{{route('admin.settings.index')}}">
                        <div class="card shadow shadow-md bg-primary-700">
                            <i class="icon-cog icon-2x"></i>
                            <div class="card-body text-center m-1 font-weight-bold">
                                الإعدادات
                            </div>
                            <label class="badge badge-dark"
                                   style="font-size: 14px;">{{\App\Models\Setting::all()->pluck('page')->unique()->count()}}</label>
                        </div>
                    </a>
                </div>
            @endcan


        </div>
    </div>
@endsection
