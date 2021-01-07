<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 * @package App\Models
 */
class ProductImage extends Model
{
    /**
     * @var string
     */
    private $folder = 'product_images';
    use HasFactory, FileAttributes;

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
