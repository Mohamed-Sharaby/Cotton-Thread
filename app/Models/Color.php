<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Color
 * @package App\Models
 */
class Color extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name','color'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productQuantities(){
        return $this->hasMany(ProductQuantity::class,'color_id');
    }
}
