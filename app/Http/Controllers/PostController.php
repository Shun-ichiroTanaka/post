<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; // fillable使用
use App\Like; //いいね
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.new');
    }

    // 新規投稿
    public function postStep(Request $request)
    {

        // バリデーション
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'tags' => 'required|string|max:255',
        //     'step1' => 'required|string',
        //     'step2' => 'nullable|string',
        //     'step3' => 'nullable|string',
        //     'step4' => 'nullable|string',
        //     'time' => 'required|string',
        // ]);

        // モデルを使って、DBに登録する値をセット
        // $step = new Post;
        // fillを使って一気にいれる
        // $fillableを使っていないと変なデータが入り込んだ場合に勝手にDBが更新されてしまうので注意
        // $step->fill($request->all())->save();

        $tags = explode(' ', $request->tags);
        $tag1 = $tags[0];
        $tag2 = (isset($tags[1])) ? $tags[1] : null;
        $tag3 = (isset($tags[2])) ? $tags[2] : null;
        $tag4 = (isset($tags[3])) ? $tags[3] : null;
        $tag5 = (isset($tags[4])) ? $tags[4] : null;

        // 二重送信対策
        $request->session()->regenerateToken();

        $step = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'tag4' => $tag4,
            'tag5' => $tag5,
            'step1' => $request->step1,
            'step2' => $request->step2,
            'step3' => $request->step3,
            'step4' => $request->step4,
            'time' => $request->time

        ]);

        // dd($request->all());

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // その時にsessionフラッシュにメッセージを入れる
        return redirect("/post/{$step->id}")->with('flash_message', __('投稿しました!'));
        // return response()->json(['success'=>'投稿に成功しました！']);
        // return redirect("/")->with('flash_message', __('投稿しました!'));
    }


    // 詳細ページ
    public function showstep($id)
    {
        if (Auth::check()) {
            $userAuth = \Auth::user();
            $step = Post::where('id', $id)->first();

            $defaultlikeCount = count($step->likes);
            $defaultstockCount = count($step->stocks);
            $defaultLiked = $step->likes->where('user_id', $userAuth->id)->first();
            if(is_countable($defaultLiked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }
            $defaultStocked = $step->stocks->where('user_id', $userAuth->id)->first();
            if(is_countable($defaultStocked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }

            return view('posts.show', [
            'step' => $step,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultStocked' => $defaultStocked,
            'defaultlikeCount' => $defaultlikeCount,
            'defaultstockCount' => $defaultstockCount
            ]);

        }else {
            $step = Post::where('id', $id)->first();
            $defaultlikeCount = count($step->likes);
            $defaultstockCount = count($step->stocks);
            $defaultLiked = $step->likes;
            $defaultStocked = $step->stocks;

            return view('posts.show', [
            'step' => $step,
            'defaultLiked' => $defaultLiked,
            'defaultStocked' => $defaultStocked,
            'defaultlikeCount' => $defaultlikeCount,
            'defaultstockCount' => $defaultstockCount
            ]);
        }

    }
    // 投稿編集
    // ユーザー情報を含めたviewファイルを返す
    public function edit()
    {
        if (Auth::user()) {
            $user = Post::find(Auth::user()->id);

            if ($user) {
                return view('posts.edit')->withUser($user);
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    // 投稿削除
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect("/")->with('flash_message', __('削除しました!'));
    }
}
