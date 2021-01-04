<?php

namespace App\Models;

use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * @package App\Models
 */
class Region extends Model
{
    use HasFactory,LangAttributes;

    /**
     * @var array
     */
    protected $fillable =['ar_name','en_name','city_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts(){
        return $this->hasMany(District::class,'region_id');
    }
}
