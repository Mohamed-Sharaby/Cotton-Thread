<?php
namespace App\Http\Traits;
/**
 * Trait FileAttribute
 * @package App\Http\Traits
 */
trait FileAttributes
{
    /**
     * @return null|string
     */
    public function getImageAttribute(){
        if(strpos($this->attributes['image'],'https') !== false)
            return $this->attributes['image'];
        return getImg($this->attributes['image']);
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value){
        if (is_string($value)) {
            $this->attributes['image'] = $value;
        } else {
            $this->attributes['image'] = uploader($value, $this->folder);
        }
    }
}