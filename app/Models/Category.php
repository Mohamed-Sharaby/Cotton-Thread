<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    private $folder = 'categories';

    use HasFactory, LangAttributes, FileAttributes, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name', 'en_name', 'image', 'is_ban'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }


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
                deleteImage('photos/categories', $image);
            }
        });
    }
}
