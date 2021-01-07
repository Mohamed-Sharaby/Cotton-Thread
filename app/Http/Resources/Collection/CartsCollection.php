<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['carts'] = $this->collection->transform(function ($q){
            return[
                'id' => $q->id,
                'address' => fix_null_string(optional($q->address)->address),
                'status' => $q->status,
                'payment' => fix_null_string($q->payment),
                'transaction_image' => fix_null_string(getImg($q->transaction_image)),
                'comment' => fix_null_string($q->comment),
                'delivered_at' => fix_null_string($q->delivered_at),
                'sum_cart_orders' => $q->sum_cart_orders,
            ];
        });
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
