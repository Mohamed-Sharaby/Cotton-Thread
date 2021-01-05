<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['addresses'] = $this->collection->transform(function ($q){
            return [
                'id' => $q->id,
                'district'=> fix_null_string(optional($q->district)->name),
                'region'=> fix_null_string(optional($q->region())->name),
                'city'=> fix_null_string(optional($q->city())->name),
                'name' => fix_null_string($q->name),
                'phone' => fix_null_string($q->phone),
                'is_default' => ($q->is_default)?true:false,
                'address' => $q->address,
                'lat' => fix_null_string($q->lat),
                'lng' => fix_null_string($q->lng),
            ];
        });

        return $data;
    }
}
