<?php

namespace App\Http\Resources\Collection;

use App\Models\Color;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductColorsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @mixin Color
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
            return[
                'id'=>$q->id,
                'color'=>$q->color,
                'product_id'=>$q->product_id,
                'sizes'=>$q->productQuantities->transform(function ($i){
                    return[
                        'id' => $i->size_id,
                        'size' => fix_null_string(optional($i->size)->size),
                        'quantity' => $i->quantity,
                        'unique_id' => $i->id
                    ];
                })
            ];
        });
    }
}
