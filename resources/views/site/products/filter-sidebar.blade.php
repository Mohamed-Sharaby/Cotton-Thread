<div class="col-md-3 col-xs-0 customizer open">
    <a class="customizer-toggle" href="javascript:void(0)">
        <span class="display-close"><i class="fas fa-cog "></i></span>
        <div class="display_open"><i class="fas fa-times "></i><span>إخفاء الفلتر</span></div>
    </a>
    <div class="customescroll">
{{--        <form id="filter_form" method="get">--}}
        <form action="{{route('website.products.filter')}}" method="get">
            <div class="cart_blocks">

                <div class="cont_block text-center">
                <button type="submit"   class="btn btn-success text-center">
                    تطبيق
                </button>
                </div>

                <div class="cont_block">
                    <h4 class="filt_title">الأقسام</h4>
                    <div class="the_checks">
                        @foreach(\App\Models\Category::active()->get() as $category)
                            <label class="custom_check">{{$category->name}}
                                <input type="checkbox" name="category" value="{{$category->id}}"  >
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="cont_block">
                    <h4 class="filt_title">الألوان</h4>
                    <div class="the_checks">
                        @foreach(\App\Models\Color::all() as $color)
                            <label class="custom_check custom_color">{{$color->name}}
                                <input type="checkbox" name="color" value="{{$color->id}}">
                                <span class="checkmark" style="background-color: {{$color->color}};"></span>
                                <span class="overlays"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="cont_block">
                    <h4 class="filt_title">المقاس</h4>
                    <div class="the_checks">
                        @foreach(\App\Models\Size::all() as $size)
                            <label class="custom_check">{{$size->size}}
                                <input type="checkbox" name="size" value="{{$size->id}}">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
{{--                <div class="cont_block">--}}
{{--                    <h4 class="filt_title">السعر</h4>--}}
{{--                    <div class="the_checks not_flx">--}}
{{--                        <label class="custom_check">0-100 ريال سعودى--}}
{{--                            <input type="checkbox" checked="checked">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                        <label class="custom_check">0-100 ريال سعودى--}}
{{--                            <input type="checkbox">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                        <label class="custom_check">0-100 ريال سعودى--}}
{{--                            <input type="checkbox">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                        <label class="custom_check">0-100 ريال سعودى--}}
{{--                            <input type="checkbox">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                        <label class="custom_check">0-100 ريال سعودى--}}
{{--                            <input type="checkbox">--}}
{{--                            <span class="checkmark"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </form>
    </div>
</div>
