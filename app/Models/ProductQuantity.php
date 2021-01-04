<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductQuantity extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['product_id','quantity','product_size_id','product_color_id','is_ban'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function productSize(){
        return $this->belongsTo(ProductSize::class);
    }

    public function productColor(){
        return $this->belongsTo(ProductColor::class);
    }

}
