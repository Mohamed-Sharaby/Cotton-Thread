<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ProductsCollection
 * @package App\Http\Resources\Collection
 */
class ProductsCollection extends ResourceCollection
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
                'id'=>$q->id,
                'name'=>$q->name,
                'image'=>$q->image,
                'price'=>$q->price,
                'rate'=>0,
                'discount'=>$q->discount,
                'price_after_discount'=>$q->price_after_discount,
            ];
        });
    }
}
