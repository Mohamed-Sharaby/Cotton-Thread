<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CartItem
 * @package App\Models
 */
class CartItem extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['cart_id','product_quantity_id','quantity','price','discount'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productQuantity(){
        return $this->belongsTo(ProductQuantity::class,'product_quantity_id');
    }




    /**
     * @param $request
     * @return array
     */
    public function addQty($request){
        $productQuantity = $this->productQuantity;
        if(!$productQuantity || $productQuantity->is_ban)
            return [__('cannot access product'),422];
        if($request['quantity']>$productQuantity->quantity )
            return [__('product quantity not available'),422];
        $this->update(['quantity'=>$this->quantity+$request['quantity']]);
        // minus qty
        $new_quantity  = $productQuantity->quantity -$request['quantity'];
        $productQuantity->update(['quantity'=>$new_quantity]);
        return [__('item quantity added'),200];
    }


    /**
     * @param $request
     * @return array
     */
    public function minusQty($request){
        $productQuantity = $this->productQuantity;
        if(!$productQuantity || $productQuantity->is_ban)
            return [__('cannot access product'),422];
        if($request['quantity']>$productQuantity->quantity )
            return [__('product quantity not available'),422];
        $this->update(['quantity'=>$this->quantity - $request['quantity']]);
        // minus qty
        $new_quantity  = $productQuantity->quantity + $request['quantity'];
        $productQuantity->update(['quantity'=>$new_quantity]);
        return [__('item quantity minus'),200];
    }

    /**
     * @return string
     */
    public function getPriceAfterDiscountAttribute(){
        $price_after_discount =  ($this->attributes['price']*(100-$this->attributes['discount']))/100;
        return number_format($price_after_discount,2,'.',',');
    }

}
