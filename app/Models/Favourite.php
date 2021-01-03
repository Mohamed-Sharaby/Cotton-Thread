<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Favourite
 * @package App\Models
 */
class Favourite extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['product_id','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
