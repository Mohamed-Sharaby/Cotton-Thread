<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 * @package App\Models
 */
class Cart extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['user_id','address_id','status','payment',
        'coupon_id','comment','delivered_at','transaction_image','coupon_perc','coupon_val'];

    /**
     * @var array
     */
    protected $dates = ['delivered_at'];

    public function getTransactionImageAttribute(){
        if(isset($this->attributes['transaction_image'])){
            if(strpos($this->attributes['transaction_image'],'https') !== false)
                return $this->attributes['transaction_image'];
            return getImg($this->attributes['transaction_image']);
        }else{
            return '';
        }
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItems(){
        return $this->hasMany(CartItem::class,'cart_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id');
    }

    /**
     * @param $productQuantity
     * @param $request
     * @return array
     * when internet found
     */
    public static function addToCart($productQuantity, $request){
        $user = auth()->user();
        $product = $productQuantity->product;
        if(!$product)
            return [__('product not available'),422];
        // open new cart
        $cart = Cart::create(['user_id'=>$user->id, 'status'=>'open']);
        // add items to cart
        $cart->cartItems()->create([
            'product_quantity_id'=>$productQuantity->id,
            'quantity'=>$request['quantity'],
            'price'=>fix_null_double(optional($product)->price),
            'discount'=>fix_null_double(optional($product)->discount),
        ]);
        // minus product quantity
        $new_quantity = $productQuantity->quantity - $request['quantity'];
        $productQuantity->update(['quantity'=>$new_quantity]);
        return [__('cart created successfully'),200];
    }


    /**
     * @param $productQuantity
     * @param $request
     * @return array
     */
    public function itemsUpdate($productQuantity, $request){
        $product = $productQuantity->product;
        if(!$product)
            return [__('product not available'),422];
        $this->itemUpdateOrCreate($productQuantity, $request, $product);
        return [__('item added to cart'),200];
    }

    /**
     * @return string
     */
    public function getSumCartOrdersAttribute(){
        $sum_orders = $this->cartItems()->selectRaw('SUM(cart_items.price*
        (1-((cart_items.discount)/100))*
        cart_items.quantity) as sum')->first()->sum;
        return number_format($sum_orders,2,'.',',');
    }

    /**
     * @param $productQuantity
     * @param $request
     * @param $product
     */
    public function itemUpdateOrCreate($productQuantity, $request, $product)
    {
        // add items to cart
        $item = $this->cartItems()->where('product_quantity_id',$productQuantity->id);
        if($item->exists()){
            $item->update([
                'quantity'=>$item->first()->quantity + $request['quantity'],
                'price'=>fix_null_double(optional($product)->price),
                'discount'=>fix_null_double(optional($product)->discount),
            ]);
        }else{
            $this->cartItems()->create([
                'product_quantity_id'=>$productQuantity->id,
                'quantity'=>$request['quantity'],
                'price'=>fix_null_double(optional($product)->price),
                'discount'=>fix_null_double(optional($product)->discount),
            ]);
        }
        // minus product quantity،
        $new_quantity = $productQuantity->quantity - $request['quantity'];
        $productQuantity->update(['quantity' => $new_quantity]);
    }


    /**
     * @return float|int
     */
    public function getTotalProductsPriceAttribute()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item->productQuantity->product->priceAfterDiscount * $item->quantity;
        }
        return $total;
    }




    public function getTaxAttribute(){
        $sum_orders = $this->cartItems()->selectRaw('SUM(cart_items.price*
        (1-((cart_items.discount)/100))* cart_items.quantity) as sum')->first()->sum;
        $tax = (1-(floatval(getSetting('tax_percentage'))/100))*$sum_orders;
        return $tax;
//        return number_format($tax,2,'.',',');
    }

    public function getDeliveryCostAttribute(){
        return getSetting('delivery_cost_percentage');
//        $sum_orders =  $this->cartItems()->selectRaw('SUM(cart_items.price*
//        (1-((cart_items.discount)/100))* cart_items.quantity) as sum')->first()->sum;
//        $delivery_cost = (1-(floatval(getSetting('delivery_cost_percentage'))/100))*$sum_orders;
//        return $delivery_cost;
//        return number_format($delivery_cost,2,'.',',');
    }

    /**
     * @return float|string
     */
    public function getTotalAttribute(){
        $sum_orders = $this->cartItems()->selectRaw('SUM(cart_items.price*
        (1-((cart_items.discount)/100))* cart_items.quantity) as sum')->first()->sum;
//        if(!getSetting('tax_percentage'))
//            return $sum_orders;
//        else{
            $tax = floatval($this->tax);
            $delivery_cost = floatval($this->delivery_cost);
            $total = $tax + $sum_orders + $delivery_cost;
            return number_format($total,2,'.',',');
//        }
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->transaction_image) {
                $image = str_replace(url('/') . '/storage/', '', $model->transaction_image);
                deleteImage('photos/carts', $image);
            }

        });
    }
}
