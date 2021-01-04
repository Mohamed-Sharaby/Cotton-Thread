<?php

namespace App\Models;

use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Models
 */
class City extends Model
{
    use HasFactory,LangAttributes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions(){
        return $this->hasMany(Region::class,'city_id');
    }

}
