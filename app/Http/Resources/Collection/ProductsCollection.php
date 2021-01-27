<?php

namespace App\Http\Resources\Collection;

use App\Models\Product;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ProductQuantityCollection;
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
     * @return \Illuminate\Support\Collection
     * @mixin Product
     */
    public function toArray($request)
    {
        $user = auth()->user();
        $product=$this;
        if($request->path() == 'api/home'){
            return $this->collection->transform(function ($q)use($user){
                return[
                    'id' => $q->id,
                    'name' => $q->name,
                    'image' => $q->image,
                    'price' => $q->price,
                    'rate' => $q->avg_rate,
                    'discount' => $q->discount,
                    'has_discount' => ((int)$q->discount>0),
                    'price_after_discount' => $q->price_after_discount,
                    'is_favourite'=>(auth()->check())?$user->isFavourite($q->id):false,
                    'colors' => new ProductColorsCollection($q->product_colors),
//                    'sizes' => new ProductSizesCollection($q->product_sizes),
                    'is_new' => ($q->is_new===0)?false:true,

                ];
            });
        }else {
            $data['products'] = $this->collection->transform(function ($q)use($user) {
                return [
                    'id' => $q->id,
                    'name' => $q->name,
                    'image' => $q->image,
                    'price' => $q->price,
                    'rate' => $q->avg_rate,
                    'discount' => $q->discount,
                    'has_discount' => ((int)$q->discount>0),
                    'price_after_discount' => $q->price_after_discount,
                    'is_favourite'=>(auth()->check())?$user->isFavourite($q->id):false,
                    'colors' => new ProductColorsCollection($q->product_colors),
//                    'sizes' => new ProductSizesCollection($q->product_sizes),
                    'is_new' => ($q->is_new===0)?false:true,
                ];
            });
        }


        if($this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator){
            $queries = array();
            if(isset($_SERVER['QUERY_STRING'])){
                parse_str($_SERVER['QUERY_STRING'], $queries);
                if(isset($queries['page']))
                    unset($queries['page']);
            }

            $data['paginate'] = [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'next_page_url' => handelQueryInPagination($this->nextPageUrl(),$queries),
                'prev_page_url' => handelQueryInPagination($this->previousPageUrl(),$queries),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ];
        }


        return $data;
    }
}
