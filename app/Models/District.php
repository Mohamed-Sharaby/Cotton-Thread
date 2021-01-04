<?php

namespace App\Models;

use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 * @package App\Models
 */
class District extends Model
{
    use HasFactory,LangAttributes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name','region_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(){
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses(){
        return $this->hasMany(Address::class,'district_id');
    }
}
