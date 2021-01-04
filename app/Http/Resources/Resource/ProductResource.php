<?php

namespace App\Http\Resources\Resource;

use App\Http\Resources\Collection\ProductColorsCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Resources\Collection\ProductSizesCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = auth()->user();
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'details'=>$this->details,
            'price' => $this->price,
            'discount' => $this->discount,
            'price_after_discount' => $this->price_after_discount,
            'is_favourite'=>(auth()->check())?$user->isFavourite($this->id):false,
            'colors' => new ProductColorsCollection($this->product_colors()->whereHas('product_quantity')->get()),
            'sizes' => new ProductSizesCollection($this->product_sizes()->whereHas('product_quantity')->get()),
            $this->mergeWhen(true,new ProductsCollection($this->similarProducts()))
        ];
    }
}
