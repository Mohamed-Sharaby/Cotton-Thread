<?php

namespace App\Http\Resources\Resource;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductColorsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return $this->product_colors->transform(function ($q){
           return[
               'id'=>$q->id,
               'color'=>$q->color,
               'sizes'=>$q->productQuantities()->where('product_id',$this->id)->get()->transform(function ($i){
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
