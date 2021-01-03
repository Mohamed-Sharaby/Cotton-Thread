<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubCategory
 * @package App\Models
 */
class SubCategory extends Model
{
    /**
     * @var string
     */
    private $folder = 'subcategories';
    use HasFactory,LangAttributes,FileAttributes,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name','category_id','image','is_ban'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany(Product::class,'subcategory_id');
    }
}
