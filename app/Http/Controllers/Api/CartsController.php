<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\CartItemsCollection;
use App\Http\Resources\Collection\CartsCollection;
use App\Http\Resources\Resource\CartResource;
use App\Http\Traits\ApiResponse;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductQuantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
     *  add to cart when internet found
     */
    public function addToCart(Request $request, Product $product){
        $user = auth()->user();

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
        $user = auth()->user();
        $cart = $item->cart;
        if($cart->user_id != $user->id || $cart->status != 'open')
            return $this->apiResponse(__('cart access denied'),403);
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
        $user = auth()->user();
        $cart = $item->cart;
        if($cart->user_id != $user->id || $cart->status != 'open')
            return $this->apiResponse(__('cart access denied'),403);
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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function openCartDetails(){
        $user = auth()->user();
        $cart = $user->carts()->where('status','open');
        if(!$cart->exists())
            return $this->apiResponse(__('cart not found'),404);
        return $this->apiResponse(new CartResource($cart->first(),true),200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function localCart(Request $request){
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'order'=>'required|array',
            'order.*.product_id'=>'required|numeric|exists:products,id',
            'order.*.size_id'=>'required|numeric|exists:sizes,id',
            'order.*.color_id'=>'required|numeric|exists:colors,id',
            'order.*.quantity'=>'required|numeric',
            'address_id'=>'required|numeric|exists:addresses,id',
            'coupon'=>'sometimes|nullable|string|exists:coupons,code',
            'payment'=>'required|string|in:COD,wallet,credit,bank_transaction',
            'transaction_image'=>'required_if:payment,bank_transaction',
            'comment'=>'sometimes|nullable|string',
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);

        foreach ($request['order'] as $item){
            $product  = Product::find($item['product_id']);
            if($product->is_ban)
                return $this->apiResponse(__('cannot access product'),422);
            $productQuantity = $product->product_quantity()
                        ->where('color_id',$item['color_id'])
                        ->where('size_id',$item['size_id'])
                        ->where('quantity','>=',$item['quantity']);

            $proQty = $productQuantity->first();
            if(!$productQuantity->exists() || $proQty->is_ban)
                return $this->apiResponse(fix_null_string(optional($product)->name).' '.__('not available'),422);

            $openCart = $user->carts()->where('status','open');
            if($openCart->exists()){
                $openCart = $openCart->first();
                $openCart->itemUpdateOrCreate($proQty,$item,$product);
            }else{
                // open new cart
                $openCart = Cart::create(['user_id'=>$user->id, 'status'=>'open']);
                $openCart->itemUpdateOrCreate($proQty,$item,$product);
            }
        }
        $openCart->refresh();
        $inputs = $request->only(['address_id','coupon','payment','transaction_image','comment']);
//        $inputs['status'] = 'confirmed';
        if($request['payment']=='wallet'){
            $wallet  = $user->wallet;
            if(!$wallet)
                return $this->apiResponse(__('user does not have a wallet'));
            $amount = $wallet->amount;
            if((float)$amount >= (float)$openCart->total){
                $user->wallet()->update(['amount'=>$amount-$openCart->total]);
                $openCart->update($inputs);
            }else{
                return $this->apiResponse(__('wallet amount not sufficient'),400);
            }
        }else{
            $openCart->update($inputs);
        }
        return $this->apiResponse(new CartResource($openCart,true));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function allCarts(Request $request){
        $user = auth()->user();
        $carts = $user->carts();
//        if(!$carts->exists())
//            return $this->apiResponse(__('cart not found'),404);
        $carts = $carts->when(($request['status']!=''),function ($q)use($request){
            $q->where('status',$request['status']);
        })->paginate(8);
        return $this->apiResponse(new CartsCollection($carts),200);
    }

    /**
     * @param Request $request
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitCart(Request $request, Cart $cart){
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'address_id'=>'required|numeric|exists:addresses,id',
            'coupon_id'=>'sometimes|nullable|numeric|exists:coupons,id',
            'payment'=>'required|string|in:COD,wallet,credit,bank_transaction',
            'transaction_image'=>'required_if:payment,bank_transaction',
            'comment'=>'sometimes|nullable|string',
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        if($cart->user_id != $user->id || $cart->status != 'open')
            return $this->apiResponse(__('cart access denied'),403);
        if(!$user->addresses()->where('id',$request['address_id'])->exists())
            return $this->apiResponse(__('address access denied'),403);
        $inputs = $request->all();
//        $inputs['status']='confirmed';
        if($request['payment']=='wallet'){
            $wallet  = $user->wallet;
            if(!$wallet)
                return $this->apiResponse(__('user does not have a wallet'));
            $amount = $wallet->amount;
            if((float)$amount >= (float)$cart->total){
                $user->wallet()->update(['amount'=>$amount-$cart->total]);
                $cart->update($inputs);
            }else{
                return $this->apiResponse(__('wallet amount not sufficient'),400);
            }
        }else{
            $cart->update($inputs);
        }
        return $this->apiResponse(['cart_id'=>$cart->id]);
    }


    /**
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeCartStatus(Request $request,Cart $cart){
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'status'=>'required|string|in:canceled,finished',
        ]);
        if($validator->fails()){
            return $this->apiResponse($validator->errors()->first(),422);
        }
        if($cart->status != 'open' || $user->id != $cart->user_id)
            return $this->apiResponse(__('cart access denied'),403);
        $cart->update(['status'=>$request['status']]);
        return $this->apiResponse(__('cart canceled successfully'),200);
    }


    /**
     * @param CartItem $item
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteItem(CartItem $item){
        $user = auth()->user();
        $cart = $item->cart()->where('status','open')
            ->where('user_id',$user->id);
        if(!$cart->exists())
            return $this->apiResponse(__('item access denied'),403);
        $item->delete();
        return $this->apiResponse(__('item deleted successfully'),200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCoupon(Request $request){
        $validator = Validator::make($request->all(),[
            'coupon'=>'required|string|exists:coupons,code',
        ]);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $coupon = Coupon::where('code',$request['coupon'])->first();
        return $this->apiResponse($coupon->discount);
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function details(Cart $cart){
        $user = auth()->user();
        if($user->id =! $cart->user_id){
            return $this->apiResponse(__('cart access denied'),403);
        }
        return $this->apiResponse(new CartResource($cart,true));
    }

}
