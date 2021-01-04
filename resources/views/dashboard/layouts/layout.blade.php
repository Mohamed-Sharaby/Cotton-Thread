<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('page-title')</title>
    <link rel="icon" href="{{asset('admin/global_assets/images/logo.png')}}">
    @include('dashboard.layouts.styles')
    @yield('styles')
</head>
<body>
@include('dashboard.layouts.navbar')
<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-right8"></i>
            </a>
            القائمة الرئيسية
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->
        <!-- Sidebar content -->
        <div class="sidebar-content">
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item-header">
                        <i class="icon-menu" title="Main"></i></li>

                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link " target="_blank">
                            <i class="icon-direction"></i>
                            <span style="background-color: #f10d0d;padding: 5px 5px;">
									 الإنتقال إلى موقع خيط وقطن
								</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.main')}}" class="nav-link ">
                            <i class="icon-home5"></i>
                            <span>
									الرئيسية
								</span>
                        </a>
                    </li>
                    {{--//////////////////////////////////////////////////////////////////////--}}

                    @canany(['Admins','Roles'])
                        <li class="nav-item nav-item-submenu {{ request()->routeIs('admin.roles.*')
                                                                || request()->routeIs('admin.admins.*')
                                                                ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ request()->routeIs('admin.admins.index') ? 'active' : '' }}"><i
                                    class="icon-law"></i> <span>الإدارة</span></a>
                            <ul class="nav nav-group-sub">
                                @can('Roles')
                                    <li class="nav-item"><a href="{{route('admin.roles.index')}}"
                                                            class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                            الصلاحيات والمناصب</a></li>
                                @endcan
                                @can('Admins')
                                    <li class="nav-item"><a href="{{route('admin.admins.index')}}"
                                                            class="nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                                            المديرين</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany


                    @can('Categories')
                        <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="{{route('admin.categories.index')}}"
                               class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                                <i class="icon-database"></i> <span>الأقسام الرئيسية</span></a>
                        </li>
                    @endcan

                    @can('SubCategories')
                        <li class="nav-item {{ request()->routeIs('admin.sub-categories.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="{{route('admin.sub-categories.index')}}"
                               class="nav-link {{ request()->routeIs('admin.sub-categories.index') ? 'active' : '' }}">
                                <i class="icon-database"></i> <span>الأقسام الفرعية</span></a>
                        </li>
                    @endcan

                    @can('Products')
                        <li class="nav-item nav-item-submenu {{ request()->routeIs('admin.products.*')
                                                                || request()->routeIs('admin.product-colors.*')
                                                                || request()->routeIs('admin.product-sizes.*')
                                                                || request()->routeIs('admin.product-quantities.*')
                                                                || request()->routeIs('admin.product-images.*')
                                                                ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ request()->routeIs('admin.cities.index') ? 'active' : '' }}"><i
                                    class="icon-server"></i> <span>المنتجات</span></a>
                            <ul class="nav nav-group-sub">

                                <li class="nav-item"><a href="{{route('admin.products.index')}}"
                                                        class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                                        <span>المنتجات</span></a></li>

                                <li class="nav-item"><a href="{{route('admin.product-colors.index')}}"
                                                        class="nav-link {{ request()->routeIs('admin.product-colors.*') ? 'active' : '' }}">
                                        ألوان المنتجات</a></li>


                                <li class="nav-item"><a href="{{route('admin.product-sizes.index')}}"
                                                        class="nav-link {{ request()->routeIs('admin.product-sizes.*') ? 'active' : '' }}">
                                        أحجام المنتجات</a></li>

                                <li class="nav-item">
                                    <a href="{{route('admin.product-quantities.index')}}"
                                       class="nav-link {{ request()->routeIs('admin.product-quantities.*') ? 'active' : '' }}">
                                        كمية المنتجات</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.product-images.index')}}"
                                       class="nav-link {{ request()->routeIs('admin.product-images.*') ? 'active' : '' }}">
                                        صور المنتجات</a>
                                </li>

                            </ul>
                        </li>
                    @endcan

                    @can('Banners')
                        <li class="nav-item {{ request()->routeIs('admin.banners.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="{{route('admin.banners.index')}}"
                               class="nav-link {{ request()->routeIs('admin.banners.index') ? 'active' : '' }}">
                                <i class="icon-image-compare"></i> <span>البانرات</span></a>
                        </li>
                    @endcan



                    @can('Settings')
                        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="{{route('admin.settings.index')}}"
                               class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                                <i class="icon-cog"></i> <span> الاعدادات</span></a>
                        </li>
                    @endcan

                    @can('Galleries')
                        <li class="nav-item {{ request()->routeIs('admin.galleries.*') ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="{{route('admin.galleries.index')}}"
                               class="nav-link {{ request()->routeIs('admin.galleries.index') ? 'active' : '' }}">
                                <i class="icon-gallery"></i> <span>مكتبة الصور والفيديو </span></a>
                        </li>
                    @endcan


                </ul>
            </div>
            <!-- /main navigation -->
        </div>
        <!-- /sidebar content -->
    </div>
    <!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
    @yield('content')
    <!-- /content area -->
        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Designed By <a href="http://panorama-q.com" target="_blank">Panorama Alqassim</a>
                </button>
            </div>
        </div>
        <!-- /footer -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
@include('dashboard.layouts.scripts')
@yield('script')
@yield('my-js')
</body>
</html>
