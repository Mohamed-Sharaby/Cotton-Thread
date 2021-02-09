<?php

namespace App\Http\Resources\Resource;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources\Resource
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @mixin User
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'is_verified'=>$this->is_verified,
            'is_ban'=>($this->is_ban==1)?true:false,
            'token'=>fix_null_string($this->token),
            'image'=>fix_null_string($this->image),
        ];
    }
}
