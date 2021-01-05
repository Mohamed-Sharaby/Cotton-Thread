<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

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

    use HasFactory,FileAttributes,HasRoles;

    /**
     * @var array
     */
    protected $fillable = ['name','email','phone','password','is_ban','image'];

    public function setPasswordAttribute($pass)
    {
        if (!empty($pass)) {
            $this->attributes['password'] = bcrypt($pass);
        }
    }

    public function setImageAttribute($image)
    {
        if (is_null($image)) {
            $this->attributes['image'] = 'uploads/user_logo.jpg';
        } else {
            $this->attributes['image'] = uploadImage('uploads', $image);
        }
    }

}
