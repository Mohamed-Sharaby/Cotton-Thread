<?php
namespace App\Http\Traits;
/**
 * Trait LangAttribute
 * @package App\Http\Traits
 */
trait LangAttributes
{
    /**
     * @return mixed
     */
    public function getNameAttribute(){
        if(app()->getLocale() == 'ar')
            return $this->ar_name;
        return $this->en_name;
    }

    /**
     * @return mixed
     */
    public function getDetails(){
        if(app()->getLocale() == 'ar')
            return $this->ar_details;
        return $this->en_details;
    }
}