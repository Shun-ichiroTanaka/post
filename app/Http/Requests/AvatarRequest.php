<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * ユーザがデータを更新するための権限を持っているかどうかを確認するために使用
     * 今回は特にないので何もせずtrueを返す
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * rulesメソッドにバリデーションルールを記載
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        // required
        // フィールドが入力データに存在しており、かつ空でないことをバリデートします。フィールドは以下の条件の場合、「空」であると判断されます。
        // 値がnullである。
        // 値が空文字列である。
        // 値が空の配列か、空のCountableオブジェクトである。
        // 値がパスのないアップロード済みファイルである。

        // file
        // フィールドがアップロードに成功したファイルであることをバリデート

        // image
        // フィールドで指定されたファイルが画像(jpg、png、bmp、gif、svg)であることをバリデート

        // image
        // フィールドで指定されたファイルが画像(jpg、png、bmp、gif、svg)であることをバリデート

        // max:値
        // フィールドが最大値として指定された値以下であることをバリデートします。sizeルールと同様の判定方法で、文字列、数値、配列、ファイルが評価
    }
}