<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // DBで間違っても変更させたくないカラム（ユーザーID、管理者権限など）にはロックをかけておく事ができる
    // ロックの掛け方にはfillableかguardedの２種類がある。
    // どちらかしか指定できない

    // モデルがその属性以外を持たなくなる（fillメソッドに対応しやすいが、カラムが増えるほど足していく必要あり）
    // protexted $fillableに指定したカラムに関してはデータの追加や更新ができる
    // 逆にいうと$fillableに指定していないカラムのデータを追加しようとしたり更新しようとしたりするとエラーが発生
    protected $fillable = [
        'id',
        'title',
        'clearTime',
        'user_id',
        'post_id',
        'tag_id'
    ];

    // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
    // $fillableの他にもう1つ$guardというものがある
    // $guardにする場合は、データの追加や更新をされたくないラムのみを指定して、あとは全部許可するという$fillableの逆の方式
    // protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

}
