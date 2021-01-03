<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * @package App\Models
 */
class Admin extends Authenticatable
{
    /**
     * @var string
     */
    private $folder = 'admins';

    use HasFactory,FileAttributes;

    /**
     * @var array
     */
    protected $fillable = ['name','email','phone','password','is_ban','image'];

}
