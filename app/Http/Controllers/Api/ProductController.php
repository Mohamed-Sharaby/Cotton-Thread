<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\ProductQuantityCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Resources\Resource\ProductResource;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            ->when(($request->has('search') && $request['search']),function ($q)use($request){
                $q->where('ar_name','like','%'.$request['search'].'%')
                    ->orWhere('en_name','like','%'.$request['search'].'%')
                    ->where('ar_details','like','%'.$request['search'].'%')
                    ->orWhere('en_details','like','%'.$request['search'].'%');
            })
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
                $subcategories_id = SubCategory::where('is_ban',0)->where('category_id',$request['category_id'])
                    ->get()->pluck('id')->toArray();
                $q->whereIn('subcategory_id',$subcategories_id);
            })
            ->when(($request->has('color') && $request['color']),function ($q)use($request){
                $q->whereHas('product_colors',function (Builder $b)use($request){
                    $b->where('colors.id',$request['color']);
                });
            })
            ->when(($request->has('size') && $request['size']),function ($q)use($request){
                $q->whereHas('product_sizes',function (Builder $b)use($request){
                    $b->where('sizes.id',$request['size']);
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
            ->when(($request->has('color') && $request['color']),function ($q)use($request){
                $q->whereHas('product_colors',function (Builder $b)use($request){
                    $b->where('colors.id',$request['color']);
                });
            })
            ->when(($request->has('size') && $request['size']),function ($q)use($request){
                $q->whereHas('product_sizes',function (Builder $b)use($request){
                    $b->where('sizes.id',$request['size']);
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

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function details(Request $request, Product $product){
        $productQuantity = ProductQuantity::where('product_id',$product->id)
            ->where('is_ban',0)
            ->when(($request['size_id']!=null),function ($q)use($request){
                $q->where('size_id',$request['size_id']);
            })
            ->when(($request['color_id']!=null),function ($q)use($request){
                $q->where('color_id',$request['color_id']);
            });
        if(!$productQuantity->exists())
            return $this->apiResponse(__('product not available'),422);
        return $this->apiResponse(new ProductQuantityCollection($productQuantity->get()),200);
    }

    public function addComment(Request $request,Product $product){
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'comment'=>'required|string',
            'rate'=>'required|numeric|between:0.1,5.0',
        ]);
        if($validator->fails()){
            return $this->apiResponse($validator->errors()->first());
        }
        $product->rates()->create([
            'user_id'=>$user->id,
            'comment'=>$request['comment'],
            'rate'=>$request['rate'],
            'is_ban'=>1
        ]);

        return $this->apiResponse(__('comment added successfully'));

    }
}
