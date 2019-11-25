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

    public function postStep(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'subtitle1' => 'required|max:255',
            'subtitle2' => 'nullable|max:255',
            'subtitle3' => 'nullable|max:255',
            'subtitle4' => 'nullable|max:255',
            'tags' => 'required|max:255',
            'step1' => 'required|max:255',
            'step2' => 'nullable|max:255',
            'step3' => 'nullable|max:255',
            'step4' => 'nullable|max:255',
            'time' => 'required|integer',
        ]);

        // モデルを使って、DBに登録する値をセット
        // $posts = new Post;
        // fillを使って一気にいれる
        // $fillableを使っていないと変なデータが入り込んだ場合に勝手にDBが更新されてしまうので注意
        // $posts->fill($request->all())->save();

        $tags = explode(' ', $request->tags);
        $tag1 = $tags[0];
        $tag2 = (isset($tags[1])) ? $tags[1] : null;
        $tag3 = (isset($tags[2])) ? $tags[2] : null;
        $tag4 = (isset($tags[3])) ? $tags[3] : null;
        $tag5 = (isset($tags[4])) ? $tags[4] : null;


        $step = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'subtitle1' => $request->subtitle1,
            'subtitle2' => $request->subtitle2,
            'subtitle3' => $request->subtitle3,
            'subtitle4' => $request->subtitle4,
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

        return redirect('/');

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // その時にsessionフラッシュにメッセージを入れる
        return redirect("/post/{$step->id}")->with('flash_message', __('投稿しました!'));
        // return redirect("/")->with('flash_message', __('投稿しました!'));
    }



    public function showstep($id)
    {
        if (Auth::check()) {
            $userAuth = \Auth::user();
            $step = Post::where('id', $id)->first();
            $defaultCount = count($step->likes);
            $defaultLiked = $step->likes->where('user_id', $userAuth->id)->first();
            if(is_countable($defaultLiked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }

            return view('posts.show', [
            'step' => $step,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount
            ]);

        }else {
            $step = Post::where('id', $id)->first();
            $defaultCount = count($step->likes);
            $defaultLiked = $step->likes;

            return view('posts.show', [
            'step' => $step,
            // 'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount
            ]);
        }

    }
}
