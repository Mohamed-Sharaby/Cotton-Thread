<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 */
class Address extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['user_id','district_id','is_default','name','phone',
        'address','lat','lng','street','house_num'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(){
        return $this->belongsTo(District::class);
    }

    /**
     * @return mixed
     */
    public function region(){
        return optional($this->district)->region;
    }

    /**
     * @return mixed
     */
    public function city(){
        return optional($this->region())->city;
    }
}
