<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch ($this->type) {
            case 'status_changed':
                return [
                    'id'=> $this->id,
                    'type'=> $this->type,
                    'title'=>(app()->getLocale() == 'ar')?
                        sprintf('تم تغير حاله الطلب %s',$this->data['id']):
                        sprintf('cart status changed %s',$this->data['id'])
                    ,
                    'body'=>(app()->getLocale() == 'ar')?
                        sprintf('تم تغير حالة الطلب %s',$this->data['id']):
                        sprintf('cart status changed %s ',$this->data['id'])
                    ,
                    'target'=> 'cart',
                    'target_id'=> $this->data['id'],    // reservation_id
                    'read_at'=>($this->read_at)?true:false,
                    'can_rate'=>($this->data['status'] == 'finished')?true:false,
                    'is_rated'=>(Rate::where('reservation_id',$this->data['id'])->where('user_id',auth()->id())->exists())?true:false,
                    'created_at'=>strtotime($this->created_at)

                ];
                break;

            default:
                return [
                    'id'=> $this->id,
                    'type'=> $this->type,
                    'title'=>(app()->getLocale() == 'ar')?$this->data['ar_name']:$this->data['en_name'],
                    'body'=>(app()->getLocale() == 'ar')?$this->data['ar_desc']:$this->data['en_desc'],
                    'target'=>'general',
                    'target_id'=>'',
                    'read_at'=>($this->read_at)?true:false,
                    'can_rate'=>false,
                    'is_rated'=>false,
                    'created_at'=>strtotime($this->created_at)
                ];
        }
    }
}
