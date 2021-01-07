<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\BannersCollection;
use App\Http\Resources\Collection\GalleryCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers\Api
 */
class HomeController extends Controller
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $banners = Banner::where('is_ban',0)->inRandomOrder()->limit(5)->get();
        $data['banners'] = new BannersCollection($banners);

        $products = Product::where('is_ban',0)->whereHas('product_quantity')
            ->inRandomOrder()->limit(8)->get();
        $data['products'] = new ProductsCollection($products);

        $new_products = Product::where('is_ban',0)->where('is_new',1)
            ->whereHas('product_quantity')->inRandomOrder()->limit(8)->get();
        $data['new_products'] = new ProductsCollection($new_products);

        $offered_products = Product::where('is_ban',0)->where('discount','>',0)
            ->whereHas('product_quantity')->inRandomOrder()->limit(8)->get();
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


    /**
     * @param $key
     * @return \Illuminate\Http\JsonResponse
     */
    public function gallery($key){
        $galleries = Gallery::where('type',$key)->where('is_ban',0)->paginate(10);
        $galleries = new GalleryCollection($galleries);
        return $this->apiResponse($galleries);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact(Request $request){
        $validate = Validator::make($request->all(),[
            'message'=>'required|string'
        ]);
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        Contact::create($request->all());
        return $this->apiResponse(__('message send successfully'));
    }

    public function wallet(){
        $user = auth()->user();
        $wallet  = $user->wallet;
        if(!$wallet)
            return $this->apiResponse(__('user does not have a wallet'));
        return $this->apiResponse($wallet->amount);
    }
}
