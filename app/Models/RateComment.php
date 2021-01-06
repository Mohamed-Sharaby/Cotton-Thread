<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RateComment
 * @package App\Models
 */
class RateComment extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['user_id','product_id','rate','comment','is_ban'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
