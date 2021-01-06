<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class FavouritesController
 * @package App\Http\Controllers\Api
 */
class FavouritesController extends Controller
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $user = auth()->user();
//        $user = User::find(1);
        $favourites = $user->favProducts()->paginate(8);
        $favourites = new ProductsCollection($favourites);

        return $this->apiResponse($favourites);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function favToggle(Product $product){
        $user = auth()->user();
//        $user = User::find(1);
        if($user->isFavourite($product->id)){
            $user->favourites()->where('product_id',$product->id)->delete();
            return $this->apiResponse(__('product removed from favourites'));
        }else{
            $user->favourites()->create(['user_id'=>$user->id,'product_id'=>$product->id]);
            return $this->apiResponse(__('product added to favourites'));
        }


    }
}
