<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    // モデルとテーブルを関連付けます。
    // テーブルを複数形、モデルを単数形とすれば自動で関連付けられるが、
    // モデル名Curriculumに対応するテーブル名「curricula」なので
    // curriculams」に変更します。
    protected $table = 'curriculums';

    // 各カリキュラムの１ページ目のリンクで
    // 例えば「http://localhost:8000/curriculum/1/1」のような形を返却するメソッド
    public function getUrl()
    {
        return url('/') . '/' . 'curriculum' . '/' . $this->id . '/1';
    }
}


