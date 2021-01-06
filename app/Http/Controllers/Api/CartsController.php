<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\CartItemsCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductQuantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CartsController
 * @package App\Http\Controllers\Api
 */
class CartsController extends Controller
{
    use ApiResponse;

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request, Product $product){
        $validator = Validator::make($request->all(),[
            'size_id'=>'required|numeric|exists:sizes,id',
            'color_id'=>'required|numeric|exists:colors,id',
            'quantity'=>'required|numeric'
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);

        if(!$product || $product->is_ban)
            return $this->apiResponse(__('cannot access product'),404);

        $productQuantity = ProductQuantity::where(function ($q)use($request,$product){
            $q->where('product_id',$product->id)
                ->where('size_id',$request['size_id'])
                ->where('color_id',$request['color_id'])
                ->where('quantity','>=',$request['quantity']);
        });

        if(!$productQuantity->exists() || $product->is_ban)
            return $this->apiResponse(__('product not available'),422);
        $user = auth()->user();
        $productQuantity = $productQuantity->first();
        $openCart = $user->carts()->where('status','open');
        if($openCart->exists()){
            $openCart = $openCart->first();
            $result = $openCart->itemsUpdate($productQuantity,$request);
            return $this->apiResponse($result[0],$result[1]);
        }else{
            $result = Cart::addToCart($productQuantity,$request->all());
            return $this->apiResponse($result[0],$result[1]);
        }
    }

    /**
     * @param Request $request
     * @param CartItem $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function addQty(Request $request, CartItem $item){
        $validator = Validator::make($request->all(),[
            'quantity'=>'required|numeric'
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        if(!$item)
            return $this->apiResponse(__('item not found'),404);
        $result = $item->addQty($request->all());
        return $this->apiResponse($result[0],$result[1]);
    }

    /**
     * @param Request $request
     * @param CartItem $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function minusQty(Request $request, CartItem $item){
        $validator = Validator::make($request->all(),[
            'quantity'=>'required|numeric'
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        if(!$item)
            return $this->apiResponse(__('item not found'),404);
        $result = $item->minusQty($request->all());
        return $this->apiResponse($result[0],$result[1]);
    }

    public function myCartDetails(){
        $user = auth()->user();
        $cart = $user->carts()->where('status','open');
        if(!$cart)
            return $this->apiResponse(__('cart not found'),404);
        $cartItems = $cart->first()->cartItems;
        return $this->apiResponse(new CartItemsCollection($cartItems),200);
    }
}
