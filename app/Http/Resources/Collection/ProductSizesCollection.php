<?php

namespace App\Http\Resources\Collection;

use App\Models\Size;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductSizesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @mixin Size
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
            return[
                'id'=>$q->id,
                'size'=>$q->size
            ];
        });
    }
}
