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
        'user_id',
        'title',
        'tag1',
        'tag2',
        'tag3',
        'tag4',
        'tag5',
        'step1',
        'step2',
        'step3',
        'step4',
        'time',
    ];

    // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
    // $fillableの他にもう1つ$guardというものがある
    // $guardにする場合は、データの追加や更新をされたくないラムのみを指定して、あとは全部許可するという$fillableの逆の方式
    // protected $guarded = ['id'];

    /**
     * この投稿を所有するUserを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 投稿のいいねを取得
     */
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    /**
     * 投稿のストックを取得
     */
     public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    // タグモデル
    // belongsToMany() メソッドの第１引数には関連するモデル名を渡します。
    // 第２引数は多対多の中間テーブル名を渡します。
    // 今回では第２引数は省略。省略された場合は、モデル名をアルファベット順で並べた物が中間テーブル名になる。
    // 中間テーブル名に規約から外れた物を指定したい時に、第２引数を指定。
    /**
     * 投稿に所属する役目を取得
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}
