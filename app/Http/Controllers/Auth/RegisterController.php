<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // ユーザー画像も選択されて登録する場合の処理
        if (request()->has('avatar')) {
            // →アップロードするファイル名を取得するため、getClientOriginalName()を使う
            // →アップロードするファイルの一時的な名を取得するため、getFilename()を使う
            // →アップロードされたファイルのパスを取得の場合、getRealPath()を使う
            // →アップロードされたファイルのサイズを取得の場合、getClientSize()を使う
            // →アップロードされたファイルのmimeタイプを取得の場合、getClientMimeType()を使う
            // →アップロードされたファイルの拡張子を取得の場合、getClientOriginalExtension()を使う

            // avatarにアップロードされたファイルを$avataruploadedに入れる
            $file = request()->file('avatar');
            $avatarname = time().'.'. $file->getClientOriginalExtension();
            $avatarpath = public_path('/img/avatar/');

            // moveはmove_uploaded_file()関数のこと
            // クライアントからのリクエストでアップロードされたファイルの保存場所を変更する際に使用するのがmove_uploaded_file関数です。
            // アップロードされたファイルはまず、/tmpなどの一時フォルダに保存されます。
            // そのままでは、一定の時間が経つと一時フォルダの中身は削除されるので、アップロードされたファイルを今後使用する場合は
            // 勝手に削除される可能性がない専用のディレクトリに保存する必要がありるため、その際にmove()メソッドを利用（ファイルを記載したパスまで移動）
            // move(アップロードしたファイルのファイル名, ファイルの移動先)
            $file->move($avatarpath, $avatarname);

            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => '/img/avatar/' . $avatarname,
            ]);

        } else {

            // ユーザー画像を登録しなかった場合、名前とメールアドレスとパスワードだけを登録する(ユーザー画像はデフォルト)
            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            ]);

        }
    }
}
