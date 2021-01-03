<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gallery
 * @package App\Models
 */
class Gallery extends Model
{
    use HasFactory,FileAttributes,LangAttributes;

    /**
     * @var array
     */
    protected $fillable = ['ar_name','en_name','ar_details','url','en_details','type','is_ban'];
}
