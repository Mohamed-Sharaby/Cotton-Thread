<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    private $cart;

    public function __construct($resource, $cart = true) {
        // Ensure we call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->cart = $cart; // $apple param passed
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->cart){
            $data=[
                'cart_id' => $this->id,
                'address' => fix_null_string(optional($this->address)->address),
                'status' => $this->status,
                'payment' => fix_null_string($this->payment),
                'transaction_image' => fix_null_string(getImg($this->transaction_image)),
                'comment' => fix_null_string($this->comment),
                'delivered_at' => fix_null_string($this->delivered_at),
                'sum_cart_orders' => $this->sum_cart_orders,
                'total' => $this->total,
                'delivery_fess' => number_format($this->delivery_cost,2,'.',','),
                'tax_fess' => number_format($this->tax,2,'.',','),
                'items' =>$this->cartItems->transform(function ($q){
                    return[
                        'id'=>$q->id,
                        'product_name'=>fix_null_string(optional(optional($q->productQuantity)->product)->name),
                        'product_image'=>fix_null_string(optional(optional($q->productQuantity)->product)->image),
                        'category_id'=>fix_null_string(optional(optional(optional($q->productQuantity)->product)->subCategory)->category_id),
                        'category_name'=>fix_null_string(optional(optional(optional(optional($q->productQuantity)->product)->subCategory)->category)->name),
                        'quantity'=>$q->quantity,
                        'price'=>$q->price,
                        'discount'=>$q->discount,
                        'has_discount'=>((int)$q->discount>0),
                        'price_after_discount'=> $q->price_after_discount,
                        'color' =>[
                            'id' => fix_null_string(optional(optional($q->productQuantity)->color)->id),
                            'color' => fix_null_string(optional(optional($q->productQuantity)->color)->color),
                        ],
                        'size' =>[
                            'id' => fix_null_string(optional(optional($q->productQuantity)->size)->id),
                            'color' => fix_null_string(optional(optional($q->productQuantity)->size)->size),
                        ],
                    ];
                }),
            ];
            return $data;
        }else{
            return $this->cartItems->transform(function ($q){
                return[
                    'id'=>$q->id,
                    'product_name'=>fix_null_string(optional(optional($q->productQuantity)->product)->name),
                    'product_image'=>fix_null_string(optional(optional($q->productQuantity)->product)->image),
                    'category_id'=>fix_null_string(optional(optional(optional($q->productQuantity)->product)->subCategory)->category_id),
                    'category_name'=>fix_null_string(optional(optional(optional(optional($q->productQuantity)->product)->subCategory)->category)->name),
                    'quantity'=>$q->quantity,
                    'price'=>$q->price,
                    'discount'=>$q->discount,
                    'has_discount'=>((int)$q->discount>0),
                    'price_after_discount'=> $q->price_after_discount,
                    'color' =>[
                        'id' => fix_null_string(optional(optional($q->productQuantity)->color)->id),
                        'color' => fix_null_string(optional(optional($q->productQuantity)->color)->color),
                    ],
                    'size' =>[
                        'id' => fix_null_string(optional(optional($q->productQuantity)->size)->id),
                        'color' => fix_null_string(optional(optional($q->productQuantity)->size)->size),
                    ],
                ];
            });
        }



    }
}
