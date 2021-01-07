<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['cart_id'] = $this->id;
        $data['address'] = fix_null_string(optional($this->address)->address);
        $data['status'] = $this->status;
        $data['payment'] = fix_null_string($this->payment);
        $data['transaction_image'] = fix_null_string(getImg($this->transaction_image));
        $data['comment'] = fix_null_string($this->comment);
        $data['delivered_at'] = fix_null_string($this->delivered_at);
        $data['cart_items'] = $this->cartItems->transform(function ($q){
            return[
                'id'=>$q->id,
                'product_name'=>fix_null_string(optional(optional($q->productQuantity)->product)->name),
                'quantity'=>$q->quantity,
                'price'=>$q->price,
                'discount'=>$q->discount,
                'has_discount'=>((int)$q->discount>0),
                'price_after_discount'=> $q->price_after_discount,
                'color' =>[
                    'id' => fix_null_string(optional(optional($q->productQuantity)->color)->id),
                    'color' => fix_null_string(optional(optional($q->productQuantity)->color)->color),
                ],
                'size' =>[
                    'id' => fix_null_string(optional(optional($q->productQuantity)->size)->id),
                    'color' => fix_null_string(optional(optional($q->productQuantity)->size)->size),
                ],
            ];
        });
        $data['sum_cart_orders'] = $this->sum_cart_orders;
        $data['total'] = $this->total;

        return $data;
    }
}
