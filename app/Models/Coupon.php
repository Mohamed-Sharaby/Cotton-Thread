<?php

namespace App\Models;

use App\Http\Traits\LangAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory,LangAttributes,SoftDeletes;

    protected $fillable = ['ar_name','en_name','code','discount'];
}
