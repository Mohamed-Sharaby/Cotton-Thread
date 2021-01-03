<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductColor
 * @package App\Models
 */
class ProductColor extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['product_id','color'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
