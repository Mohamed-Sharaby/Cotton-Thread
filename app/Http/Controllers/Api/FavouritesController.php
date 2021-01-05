<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    use ApiResponse;

    public function index(){
        $user = auth()->user();
//        $user = User::find(1);
        $favourites = $user->favProducts()->paginate(8);
        $favourites = new ProductsCollection($favourites);

        return $this->apiResponse($favourites);
    }

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
