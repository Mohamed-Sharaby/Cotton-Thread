<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
    public function index(Request $request){
        $user = auth()->user();
//        $user = User::find(1);
        $favourites = $user->favProducts()
            ->when(($request->has('category_id') && $request['category_id']),function ($q)use($request){
                $subcategories_id = SubCategory::where('is_ban',0)->where('category_id',$request['category_id'])
                    ->get()->pluck('id')->toArray();
                $q->whereIn('subcategory_id',$subcategories_id);
            })
            ->when(($request->has('color_id') && $request['color_id']),function ($q)use($request){
                $q->whereHas('product_colors',function (Builder $b)use($request){
                    $b->where('colors.id',$request['color_id']);
                });
            })
            ->when(($request->has('size_id') && $request['size_id']),function ($q)use($request){
                $q->whereHas('product_sizes',function (Builder $b)use($request){
                    $b->where('sizes.id',$request['size_id']);
                });
            })
            ->when(($request->has('order_by') && $request['order_by']),function ($q)use($request){
                if($request['order_by'] == 'max')
                    $q->orderBy('price','desc');
                elseif ($request['order_by'] == 'min')
                    $q->orderBy('price','asc');
                elseif ($request['order_by'] == 'big_discount')
                    $q->orderBy('discount','desc');
                elseif ($request['order_by'] == 'most_sale')
                    $q;     // edit in future
                else
                    $q;
            })->paginate(8);
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
