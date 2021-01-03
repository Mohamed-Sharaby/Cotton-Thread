<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BannersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
           return[
               'id'=>$q->id,
               'image'=>$q->image,
               'details'=>$q->details
           ];
        });
    }
}
