<template>
    <!---//////////// Start Header //////////////////------------>
    <header class="my-header">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img :src="`website/img/asset3.jpg`|baseUrl"></div>
                <div class="swiper-slide"><img :src="`website/img/banner1.jpg`|baseUrl"></div>
                <div class="swiper-slide"><img :src="`website/img/asset3.jpg`|baseUrl"></div>
                <div class="swiper-slide"><img :src="`website/img/banner1.jpg`|baseUrl"></div>
                <div class="swiper-slide"><img :src="`website/img/asset3.jpg`|baseUrl"></div>
                <div class="swiper-slide"><img :src="`website/img/banner1.jpg`|baseUrl"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </header>
    <!---//////////// End header //////////////////------------>
</template>

<script>
    export default {
        name: "Slider"
    }
</script>

<style scoped>

</style>