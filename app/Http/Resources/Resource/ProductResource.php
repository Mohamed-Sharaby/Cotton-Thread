<?php

namespace App\Http\Resources\Resource;

use App\Http\Resources\Collection\ProductColorsCollection;
use App\Http\Resources\Collection\ProductsCollection;
use App\Http\Resources\Collection\ProductSizesCollection;
use App\Http\Resources\Collection\RatesCollection;
use App\Models\Product;
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
     * @mixin Product
     */
    public function toArray($request)
    {
        $user = auth()->user();
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'details'=>$this->details,
            'image'=>$this->image,
            'price' => $this->price,
            'has_discount' => ((int)$this->discount>0),
            'discount' => $this->discount,
            'rate' => $this->avg_rate,
            'is_rated'=> (auth()->check())?$user->isRated($this->id):false,
            'price_after_discount' => $this->price_after_discount,
            'is_favourite'=>(auth()->check())?$user->isFavourite($this->id):false,
            'images' => $this->product_images->pluck('image'),
            'colors' => new ProductColorsResource($this),
//            'sizes' => new ProductSizesCollection($this->product_sizes),
            'rates' => new RatesCollection($this->rates),
            $this->mergeWhen(true,new ProductsCollection($this->similarProducts())),
        ];
    }
}
