<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'district'=> fix_null_string(optional($this->district)->name),
            'region'=> fix_null_string(optional($this->region())->name),
            'city'=> fix_null_string(optional($this->city())->name),
            'name' => fix_null_string($this->name),
            'phone' => fix_null_string($this->phone),
            'is_default' => ($this->is_default)?true:false,
            'street' => fix_null_string($this->street),
            'house_num' => fix_null_string($this->house_num),
            'address' => fix_null_string($this->address),
            'lat' => fix_null_string($this->lat),
            'lng' => fix_null_string($this->lng),
        ];
    }
}
