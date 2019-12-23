<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; // fillable使用
use App\Like; //いいね
use App\Stock;
use App\Step;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     // can(Policy)の、destructiveメソッドの、postに対しての制約をmiddleware指定する。
    //     // edit, update, destoryに対してのみmiddlewareを適用する。
    //     $this->middleware('can:destructive,post')
    //          ->only(['edit', 'update', 'delete']);
    // }

    public function index()
    {
        return view('posts.new');
    }

    // 新規投稿
    public function postStep(Request $request)
    {

        // 二重送信対策
        $request->session()->regenerateToken();

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'clearTime' => $request->time,
        ]);

        $steps_name = $request->steps_name;
        $steps_body = $request->steps_body;
        $step_ids = [];
        foreach ($steps_name as $step_name) {
            if(!empty($step_name)){
                 $step = Step::firstOrCreate([
                     'name' => $step_name,
                 ]);
                 $step_ids[] = $step->id;
             }
        }
        foreach ($steps_body as $step_body) {
            if(!empty($step_body)){
                 $step = Step::firstOrCreate([
                     'body' => $step_body,
                 ]);
                 $step_ids[] = $step->id;
             }
        }
        // 中間テーブル
        $post->steps()->attach($step_ids);  

        $tags_name = $request->tags;
        $tag_ids = [];
        foreach ($tags_name as $tag_name) {
            if(!empty($tag_name)){
                 $tag = Tag::firstOrCreate([
                     'name' => $tag_name,
                 ]);
                 $tag_ids[] = $tag->id;
             }
        }
        // 中間テーブル
        $post->tags()->attach($tag_ids);  

        // dd($request->all());

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // その時にsessionフラッシュにメッセージを入れる
        return redirect("/post/{$post->id}")->with('flash_message', __('投稿しました!'));
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
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::user()) {
                $tags = explode(' ', $request->tags);
                $tag1 = $tags[0];
                $tag2 = (isset($tags[1])) ? $tags[1] : null;
                $tag3 = (isset($tags[2])) ? $tags[2] : null;
                $tag4 = (isset($tags[3])) ? $tags[3] : null;
                $tag5 = (isset($tags[4])) ? $tags[4] : null;
        
                // 二重送信対策
                $request->session()->regenerateToken();
        
                $post = Post::updateOrCreate([
                    'user_id' => auth()->id(),
                    'title' => $request->title,
                    'tag1' => $tag1,
                    'tag2' => $tag2,
                    'tag3' => $tag3,
                    'tag4' => $tag4,
                    'tag5' => $tag5,
                    'subtitle1' => $request->subtitle1,
                    'subtitle2' => $request->subtitle2,
                    'subtitle3' => $request->subtitle3,
                    'subtitle4' => $request->subtitle4,
                    'step1' => $request->step1,
                    'step2' => $request->step2,
                    'step3' => $request->step3,
                    'step4' => $request->step4,
                    'time' => $request->time
                ]);
                // $post->save();
        } else {
            return redirect()->back();
        }
    }

    // 投稿削除
    public function delete(Request $request)
    {
        // Policyのdestructiveメソッドを適用($postは第2引数にあたる)
        // $this->authorize('destructive', $request);
        Post::find($request->id)->delete();
        return redirect()->back()->with('flash_message', __('投稿を削除しました!'));
    }
}
