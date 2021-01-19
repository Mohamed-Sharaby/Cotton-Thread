<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 * @package App\Models
 */
class Banner extends Model
{
    /**
     * @var string
     */
    private  $folder = 'banners';
    use HasFactory ,FileAttributes ,LangAttributes;

    /**
     * @var array
     */
    protected $fillable = ['image','ar_details','en_details','is_ban'];


    public function scopeActive($query)
    {
        return $query->where('is_ban', 0);
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('photos/banners', $image);
            }
        });
    }
}
