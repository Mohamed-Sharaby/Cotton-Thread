<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallet
 * @package App\Models
 */
class Wallet extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['user_id','amount'];
}
