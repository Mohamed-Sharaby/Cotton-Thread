<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models
 */
class Setting extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['name','type','ar_value','en_value','page','slug','ar_title','en_title'];

    /**
     * @return mixed
     */
    public function getValueAttribute(){
        if(app()->getLocale() == 'ar')
            return $this->ar_value;
        return $this->en_value;
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute(){
        if(app()->getLocale() == 'ar')
            return $this->ar_title;
        return $this->en_title;
    }
}
