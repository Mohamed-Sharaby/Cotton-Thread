<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    /**
     * @var string
     */
    private $folder = 'users';
    use HasFactory, Notifiable,FileAttributes,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','phone','password','is_ban','confirmation_code','reset_code','image'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function fcm_tokens(){
        return $this->morphMany(FcmToken::class,'userable');
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value){
        if(isset($value)){
            $this->attributes['password']  = bcrypt($value);
        }
    }
}
