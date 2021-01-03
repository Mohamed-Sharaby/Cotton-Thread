<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * @var string
     */
    private $folder = 'products';

    use HasFactory,LangAttributes,FileAttributes,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name','price','discount','subcategory_id','is_ban',
        'ar_details','en_details','image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
