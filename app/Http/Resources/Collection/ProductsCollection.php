<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
     * @return array
     */
    public function toArray($request)
    {
        $user = auth()->user();
        if($request->path() == 'api/home'){
            return $this->collection->transform(function ($q)use($user){
                return[
                    'id' => $q->id,
                    'name' => $q->name,
                    'image' => $q->image,
                    'price' => $q->price,
                    'rate' => 0,
                    'discount' => $q->discount,
                    'price_after_discount' => $q->price_after_discount,
                    'is_favourite'=>(auth()->check())?$user->isFavourite($this->id):false,
                    'colors' => new ProductColorsCollection($q->product_colors),
                    'sizes' => new ProductSizesCollection($q->product_sizes),
                ];
            });
        }else {
            $data['products'] = $this->collection->transform(function ($q)use($user) {
                return [
                    'id' => $q->id,
                    'name' => $q->name,
                    'image' => $q->image,
                    'price' => $q->price,
                    'rate' => 0,
                    'discount' => $q->discount,
                    'price_after_discount' => $q->price_after_discount,
                    'is_favourite'=>(auth()->check())?$user->isFavourite($this->id):false,
                    'colors' => new ProductColorsCollection($q->product_colors),
                    'sizes' => new ProductSizesCollection($q->product_sizes),
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
