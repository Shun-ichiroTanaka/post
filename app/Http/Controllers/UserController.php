<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Post;
use App\Like;
use App\Stock;

class UserController extends Controller
{

    // マイページ
    public function profile($id)
    {
        $user = User::find($id);
        
        // ユーザーの投稿のみを取り出す
        $articles = \App\Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        // ユーザーがしたいいねを取り出す
        $likes = $user->likes()->orderBy('created_at', 'desc')->get();
        // ユーザーのストック(登録)を取り出す
        $stocks = $user->stocks()->orderBy('created_at', 'desc')->get();


        if ($user) {
            return view('user.profile',compact('articles', 'likes','stocks'))->withUser($user);
        } else {
            // URLからidをいじって他のユーザーページにアクセスしないように例外処理
            // ＝自分のid以外にアクセスさせない
            return redirect()->back();
        }
    }

    // プロフィール編集
    // ユーザー情報を含めたviewファイルを返す
    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    // プロフィールアップデート
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {

            $validate = null;
            if(Auth::user()->email === $request['email']){
                $validate = $request->validate([
                  'name' => 'required|min:2',
                  'info' => 'required|string|max:130',
                ]);
            } else {
                $validate = $request->validate([
                  'name' => 'required|min:2',
                  'info' => 'required|string|max:130',
                ]);
            }

            if($validate) {
                $user->name = $request['name'];
                $user->info = $request['info'];

                if ($request->hasfile('avatar')) {
                    $file = $request->file('avatar');
                    $extension = $file->getClientOriginalExtension(); //getting avatar extension
                    $filename = time() . '.' . $extension;
                    $file->move('img/avatar/' , $filename);
                    $user->avatar = $filename;
                }                
                $user->save();
                $user->avatar = $request['avatar'];
                
                return redirect()->back()->with('flash_message', 'プロフィールを変更しました!');

            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function passwordEdit()
    {
        //
    }

    public function passwordUpdate()
    {
        //
    }


}
