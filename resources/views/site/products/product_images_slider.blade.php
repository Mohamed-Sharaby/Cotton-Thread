<div class="col-md-6 col-xs-12">
    <div class="img-pro-slider">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <div class="swiper-slide"
                     style="background-image:url({{$product->image}})"></div>
                @foreach($product->product_images as $image)
                    <div class="swiper-slide"
                         style="background-image:url({{$image->image}})"></div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @foreach($product->product_images as $image)
                    <div class="swiper-slide"
                         style="background-image:url({{$image->image}})"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
