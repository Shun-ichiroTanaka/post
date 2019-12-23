<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'id', 'post_id', 'user_id'
    ];

    public function post()
    {
        // return $this->belongsTo(\App\Post::class);
        return $this->hasMany('App\Post');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    
}
