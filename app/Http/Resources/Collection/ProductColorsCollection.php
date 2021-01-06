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
                'color'=>$q->color
            ];
        });
    }
}
