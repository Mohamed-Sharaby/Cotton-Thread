<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Size
 * @package App\Models
 */
class Size extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['size'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productQuantities(){
        return $this->hasMany(ProductQuantity::class,'size_id');
    }
}
