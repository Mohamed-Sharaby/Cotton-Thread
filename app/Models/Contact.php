<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * @package App\Models
 */
class Contact extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable =['name','email','phone','message'];
}
