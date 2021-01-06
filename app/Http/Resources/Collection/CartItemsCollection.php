<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartItemsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
            return[
                'cart_id'=>$q->cart->id,
                'id'=>$q->id,
                'product'=>$q->productQuantity->product->name
            ];
        });
    }
}
