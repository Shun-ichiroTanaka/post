<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'id', 'post_id', 'user_id','like_count'
    ];

    /**
     * このいいねを所有する投稿を取得
     */
    public function post()
    {
        return $this->belongsTo(\App\Post::class);
        return $this->hasMany('App\Post');
    }

    /**
     * このいいねを所有するUserを取得
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
        return $this->hasMany('App\User');
    }
}
