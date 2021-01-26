<section class="all-sections">
    <div class="container">
        <div class="head-title">
            <h2>المنتجات الجديدة</h2>
            <p>يوجد أكثر من 20 قسم للملابس الجاهزة</p>
        </div>
        <div class="flex_row">
            <div class="row">
                @foreach($newProducts as $product)
                    @include('site.products.product-component',['product'=>$product])
                    @include('site.modals.add_to_cart')
                @endforeach
            </div>
        </div>
        <a class="btn-hvr see_more" href="{{route('website.products.new')}}">عرض المزيد</a>
    </div>
</section>
