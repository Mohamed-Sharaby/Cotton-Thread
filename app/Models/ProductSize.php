<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSize
 * @package App\Models
 */
class ProductSize extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['product_id','size'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_quantity(){
        return $this->hasMany(ProductQuantity::class,'product_size_id');
    }
}
