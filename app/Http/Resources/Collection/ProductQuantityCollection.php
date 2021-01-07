<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductQuantityCollection extends ResourceCollection
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
                'color'=>[
                    'id'=>$q->color->id,
                    'color'=>$q->color->color,
                ],
                'size'=>[
                    'id'=>$q->size->id,
                    'size'=>$q->size->size,
                ],
                'quantity'=>$q->quantity
            ];
        });
    }
}
