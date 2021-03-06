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
        'ar_details','en_details','image','is_new'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }


    public function scopeActive($query)
    {
        return $query->where('is_ban', 0);
    }

    /**
     * @return string
     */
    public function getPriceAfterDiscountAttribute(){
        $price_after_discount =  ($this->attributes['price']*(100 - $this->attributes['discount']))/100;
        return number_format($price_after_discount,2,'.',',');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function product_colors(){
        return $this->hasManyThrough(Color::class,ProductQuantity::class,'product_id','id','id','color_id')->where('is_ban',0)->where('quantity','>',0);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function product_sizes(){
        return $this->hasManyThrough(Size::class,ProductQuantity::class,'product_id','id','id','size_id')->where('is_ban',0);
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

    /**
     * @return mixed
     */
    public function similarProducts(){
        return Product::where('subcategory_id',$this->subcategory_id)
                    ->where('is_ban',0)
                    ->whereHas('product_quantity')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates(){
        return $this->hasMany(RateComment::class,'product_id');
    }

    /**
     * @return string
     */
    public function getAvgRateAttribute(){
        $avg =  $this->rates()->average('rate');
        return number_format($avg,2,'.',',');
    }

    public function getProductRateAttribute(){
        $count =  $this->rates()->count();
        $sum =  $this->rates()->sum('rate');
        if ($count > 0)
            return ceil($sum / $count);
        return 0;
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function getFavAttribute()
    {
        return $this->favourites()->where('user_id', auth()->id())->exists();
    }

    /**
     * @return mixed
     */
    public function getQuantityAttribute()
    {
        return $this->product_quantity()->sum('quantity');
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('photos/products', $image);
            }
        });
    }

}
