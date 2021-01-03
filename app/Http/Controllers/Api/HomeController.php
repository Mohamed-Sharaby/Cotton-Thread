<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\BannersCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $banners = Banner::where('is_ban',0)->inRandomOrder()->limit(5)->get();
        $data['banners'] = new BannersCollection($banners);

        $products = Product::where('is_ban',0)->inRandomOrder()->limit(8)->get();
        $data['products'] = new ProductsCollection($products);

        $new_products = Product::where('is_new',1)->where('is_ban',0)->inRandomOrder()->limit(8)->get();
        $data['new_products'] = new ProductsCollection($new_products);

        $offered_products = Product::where('discount','>',0)->where('is_ban',0)->inRandomOrder()->limit(8)->get();
        $data['offered_products'] = new ProductsCollection($offered_products);

        $data['offer_image']= getSetting('offer_image');
        return $this->apiResponse($data);
    }

    /**
     * @param $key
     * @return \Illuminate\Http\JsonResponse
     */
    public function setting($key){
        return $this->apiResponse(getSetting($key));
    }
}
