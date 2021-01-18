<?php

namespace App\Http\Resources\Collection;

use App\Models\RateComment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RatesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @mixin RateComment
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($q){
            return[
                'id'=>$q->id,
                'rate'=>$q->rate,
                'comment'=>fix_null_string($q->comment),
                'user_name'=>fix_null_string(optional($q->user)->name),
                'user_image'=>fix_null_string(optional($q->user)->image),
                'rate_date'=> fix_null_string($q->created_at->formate('d M Y , h:i a'))
            ];
        });
    }
}
