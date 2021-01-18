<template>
    <div>
        <slider></slider>
        <categories></categories>
        <new-products></new-products>
        <offers-banners></offers-banners>
        <products-offer></products-offer>
        <add-to-cart></add-to-cart>
    </div>
</template>

<script>
    import Slider from './Slider.vue';
    import Categories from './Categories.vue';
    import NewProducts from './NewProducts.vue';
    import OffersBanners from './OffersBanners.vue';
    import ProductsOffer from './ProductsOffer.vue';
    import AddToCart from '../modals/AddToCart.vue';
    export default {
        name: "Main",
        components:{
            'slider':Slider,
            'categories':Categories,
            'new-products':NewProducts,
            'offers-banners':OffersBanners,
            'products-offer':ProductsOffer,
            'add-to-cart':AddToCart
        },
        mounted(){
            axios.get('/api/site/test')
                .then(({data})=>{
                    console.log(data);
                })
                .catch((data)=>{
                    console.log(data);
                })
        }
    }
</script>

<style scoped>

</style>