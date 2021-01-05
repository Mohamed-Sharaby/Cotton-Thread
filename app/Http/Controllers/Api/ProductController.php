<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Resources\Resource\ProductResource;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{
    use ApiResponse;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        $products = Product::where('is_ban',0)->whereHas('product_quantity')
            ->when(($request->has('is_new') && $request['is_new']),function ($q)use($request){
                if($request['is_new'] == true)
                    $q->where('is_new',1);

            })
            ->when(($request->has('has_discount') && $request['has_discount']),function ($q)use($request){
                if($request['has_discount'] == true)
                    $q->where('discount','>',0);
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
            })
            ->when(($request->has('category_id') && $request['category_id']),function ($q)use($request){
                $subcategories_id = Category::where('is_ban',0)->where('id',$request['category_id'])->first();
                $q->whereIn('subcategory_id',$subcategories_id);
            })
            ->when(($request->has('color') && $request['color']),function ($q)use($request){
                $q->whereHas('product_colors',function (Builder $b)use($request){
                    $b->where('color',$request['color']);
                });
            })
            ->when(($request->has('size') && $request['size']),function ($q)use($request){
                $q->whereHas('product_sizes',function (Builder $b)use($request){
                    $b->where('size',$request['size']);
                });
            })
            ->paginate(8);
        return $this->apiResponse(new ProductsCollection($products));
    }

    /**
     * @param Request $request
     * @param SubCategory $subCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function proBySubcategory(Request $request, SubCategory $subCategory){
        $products = $subCategory->products()
            ->where('is_ban',0)
            ->whereHas('product_quantity')
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
            })
            ->paginate(8);
        return $this->apiResponse(new ProductsCollection($products));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product){
        return $this->apiResponse(new ProductResource($product));
    }
}
