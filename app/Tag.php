<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'id', 'post_id', 'user_id'
    ];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
