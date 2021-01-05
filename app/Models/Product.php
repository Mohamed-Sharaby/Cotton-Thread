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

    use HasFactory,LangAttributes  ,FileAttributes ,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name','price','discount','subcategory_id','is_ban',
        'ar_details','en_details','image','is_new'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    /**
     * @return string
     */
    public function getPriceAfterDiscountAttribute(){
        $price_after_discount =  ($this->attributes['price']*(100-$this->attributes['discount']))/100;
        return number_format($price_after_discount,2,'.',',');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_colors(){
        return $this->hasMany(ProductColor::class,'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_sizes(){
        return $this->hasMany(ProductSize::class,'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_quantity(){
        return $this->hasMany(ProductQuantity::class,'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function similarProducts(){
        return Product::where('subcategory_id',$this->subcategory_id)
                    ->where('is_ban',0)
                    ->whereHas('product_quantity')->get();
    }


}
