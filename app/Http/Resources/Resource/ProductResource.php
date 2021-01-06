<?php

namespace App\Http\Resources\Resource;

use App\Http\Resources\Collection\ProductColorsCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Resources\Collection\ProductSizesCollection;
use App\Http\Resources\Collection\RatesCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductResource
 * @package App\Http\Resources\Resource
 */
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
            'rate' => $this->avg_rate,
            'is_rated'=> (auth()->check())?$user->isRated($this->id):false,
            'price_after_discount' => $this->price_after_discount,
            'is_favourite'=>(auth()->check())?$user->isFavourite($this->id):false,
            'colors' => new ProductColorsCollection($this->product_colors),
            'sizes' => new ProductSizesCollection($this->product_sizes),
            'rates' => new RatesCollection($this->rates),
            $this->mergeWhen(true,new ProductsCollection($this->similarProducts())),
        ];
    }
}
