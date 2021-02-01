<?php

namespace App\Models;

use App\Http\Traits\FileAttributes;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject
{
    /**
     * @var string
     */
    private $folder = 'users';
    use HasFactory, Notifiable, FileAttributes, SoftDeletes;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'password', 'is_ban', 'confirmation_code', 'reset_code', 'image'];

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
    public function fcm_tokens()
    {
        return $this->morphMany(FcmToken::class, 'userable');
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favProducts()
    {
        return $this->belongsToMany(Product::class, 'favourites');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    /**
     * @param $product_id
     * @return bool
     */
    public function isFavourite($product_id)
    {
        if (!auth()->check())
            return false;
        else
            return $this->favourites()->where('product_id', $product_id)->exists();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates()
    {
        return $this->hasMany(RateComment::class, 'user_id');
    }

    /**
     * @param $product_id
     * @return bool
     */
    public function isRated($product_id)
    {
        if (!auth()->check())
            return false;
        else
            return $this->rates()->where('product_id', $product_id)->exists();
    }

    /**
     * @return bool
     */
    public function getIsVerifiedAttribute()
    {
        return $this->attributes['confirmation_code'] === 'verified';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('photos/users', $image);
            }

            if ($model->rates) {
                foreach ($model->rates as $rate) {
                    $rate->delete();
                }
            }

            if ($model->addresses) {
                foreach ($model->addresses as $address) {
                    $address->delete();
                }
            }

            if ($model->favourites) {
                foreach ($model->favourites as $favourite) {
                    $favourite->delete();
                }
            }

            if ($model->carts) {
                foreach ($model->carts as $cart) {
                    foreach ($cart->cartItems as $item){
                        $item->delete();
                    }
                    $cart->delete();
                }
            }

        });
    }
}
