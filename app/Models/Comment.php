<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'publication_id','id_user','description'
    ];

    public function publication(){
        return $this->belongsTo('App\Models\Publication');
    }

    public function user(){
        return $this->hasOne('App\Models\User','id','id_user');
    }
}
