<?php

namespace App\Http\Resources\Collection;

use App\Models\RateComment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['notifications'] = $this->collection->transform(function ($q){
            switch ($q->type) {
                case 'cart_status_changed':
                    return [
                        'id'=> $q->id,
                        'type'=> $q->type,
                        'data'=>$q->data,
//                        'title'=>(app()->getLocale() == 'ar')?
//                            sprintf('تم تغير حاله الطلب %s',$q->data['id']):
//                            sprintf('cart status changed %s',$q->data['id'])
//                        ,
//                        'body'=>(app()->getLocale() == 'ar')?
//                            sprintf('تم تغير حالة الطلب %s',$q->data['id']):
//                            sprintf('cart status changed %s ',$q->data['id'])
//                        ,
                        'target'=> 'cart',
//                        'target_id'=> $q->data['id'],    // reservation_id
                        'read_at'=>($q->read_at)?true:false,
//                        'can_rate'=>($q->data['status'] == 'finished')?true:false,
                        'is_rated'=>false,//(RateComment::where('product_id',$q->data['id'])->where('user_id',auth()->id())->exists())?true:false,
                        'created_at'=>strtotime($q->created_at)

                    ];
                    break;

                default:
                    return [
                        'id'=> $q->id,
                        'type'=> $q->type,
                        'title'=>(app()->getLocale() == 'ar')?$q->data['ar_name']:$q->data['en_name'],
                        'body'=>(app()->getLocale() == 'ar')?handleArrayKeyNotExists($q->data,'ar_desc'):handleArrayKeyNotExists($q->data,'en_desc'),
                        'target'=>'general',
                        'target_id'=>'',
                        'read_at'=>($q->read_at)?true:false,
                        'can_rate'=>false,
                        'is_rated'=>false,
                        'created_at'=>strtotime($q->created_at)
                    ];
            }
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
