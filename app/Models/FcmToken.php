<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FcmToken
 * @package App\Models
 */
class FcmToken extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['userable_type','userable_id','type','token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function userable(){
        return $this->morphTo();
    }
}
