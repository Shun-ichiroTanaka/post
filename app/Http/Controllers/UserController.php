<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        $articles = Post::orderBy('created_at', 'asc')->get();

        if ($user) {
            return view('user.profile',compact('articles'))->withUser($user);
        } else {
            // URLからidをいじって他のユーザーページにアクセスしないように例外処理
            // ＝自分のid以外にアクセスさせない
            return redirect()->back();
        }

    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {

            $validate = null;
            if(Auth::user()->email === $request['email']){
                $validate = $request->validate([
                  'name' => 'required|min:2',
                  'email' => 'required|email',
                ]);
            } else {
                $validate = $request->validate([
                  'name' => 'required|min:2',
                  'email' => 'required|email|unique:users|',
                ]);
            }

            if($validate) {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->save();
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
