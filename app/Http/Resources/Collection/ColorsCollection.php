<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['colors']=$this->collection->transform(function ($q){
            return[
                'id'=>$q->id,
                'name'=>$q->name,
                'color'=>$q->color,
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
