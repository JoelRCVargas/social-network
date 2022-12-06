<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fanpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'cover',
        'profile',
        'description',
        'address',
        'website',
        'email'
    ];
    
}
