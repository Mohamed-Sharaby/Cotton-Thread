<?php

namespace App\Http\Resources\Collection;

use App\Models\Color;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductColorsCollection extends ResourceCollection
{
    private $product;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @mixin Color
     */
    public function __construct($resource,$product)
    {

        parent::__construct($resource);
        $this->resource = $resource;
        $this->product = $product;
    }

    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
            return[
                'id'=>$q->id,
                'color'=>$q->color,
                'sizes'=>$q->productQuantities->where('product_id',$this->product->id)->transform(function ($i){
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
