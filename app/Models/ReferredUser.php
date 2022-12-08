<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferredUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'referral_token',
        'id_referred_user',
        'id_invited_by',
        'id_user'
    ];
}
