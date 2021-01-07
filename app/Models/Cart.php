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
    protected $fillable = ['user_id', 'address_id', 'status', 'payment',
        'coupon_id', 'comment', 'delivered_at', 'transaction_image'];

    protected $dates = ['delivered_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }


    /**
     * @param $productQuantity
     * @param $request
     * @return array
     */
    public static function addToCart($productQuantity, $request)
    {
        $user = auth()->user();
        $product = $productQuantity->product;
        if (!$product)
            return [__('product not available'), 422];
        // open new cart
        $cart = Cart::create(['user_id' => $user->id, 'status' => 'open']);
        // add items to cart
        $cart->cartItems()->create([
            'product_quantity_id' => $productQuantity->id,
            'quantity' => $request['quantity'],
            'price' => fix_null_double(optional($product)->price),
            'discount' => fix_null_double(optional($product)->discount),
        ]);
        // minus product quantity
        $new_quantity = $productQuantity->quantity - $request['quantity'];
        $productQuantity->update(['quantity' => $new_quantity]);
        return [__('cart created successfully'), 200];
    }


    /**
     * @param $productQuantity
     * @param $request
     * @return array
     */
    public function itemsUpdate($productQuantity, $request)
    {
        $product = $productQuantity->product;
        if (!$product)
            return [__('product not available'), 422];
        // add items to cart
        $item = $this->cartItems()->where('product_quantity_id', $productQuantity->id);
        if ($item->exists()) {
            $item->update([
                'quantity' => $item->first()->quantity + $request['quantity'],
                'price' => fix_null_double(optional($product)->price),
                'discount' => fix_null_double(optional($product)->discount),
            ]);
        } else {
            $this->cartItems()->create([
                'product_quantity_id' => $productQuantity->id,
                'quantity' => $request['quantity'],
                'price' => fix_null_double(optional($product)->price),
                'discount' => fix_null_double(optional($product)->discount),
            ]);
        }
        // minus product quantity
        $new_quantity = $productQuantity->quantity - $request['quantity'];
        $productQuantity->update(['quantity' => $new_quantity]);
        return [__('item added to cart'), 200];
    }


    public function getTotalProductsPriceAttribute()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item->productQuantity->product->priceAfterDiscount * $item->quantity;
        }
        return $total;
    }

}
