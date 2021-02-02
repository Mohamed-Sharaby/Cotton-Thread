<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = ['notifiable_type', 'notifiable_id', 'data', 'type', 'read_at'];

    protected $keyType = 'string';
}
