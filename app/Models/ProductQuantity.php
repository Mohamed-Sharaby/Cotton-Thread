<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductQuantity
 * @package App\Models
 */
class ProductQuantity extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['product_id','quantity','product_size_id','product_color_id','is_ban'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productSize(){
        return $this->belongsTo(ProductSize::class,'product_size_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productColor(){
        return $this->belongsTo(ProductColor::class,'product_color_id');
    }

}
