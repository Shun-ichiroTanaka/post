<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; // fillable使用
use App\Like; //いいね
use App\Stock;
use App\Step;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.new');
    }

    // 新規投稿
    public function newpost(Request $request, Post $post)
    {
        // 二重送信対策
        $request->session()->regenerateToken();

        // タイトル、目標時間
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'clearTime' => $request->clearTime,
        ]);

        // ステップ内容
        foreach ($request['step'] as $step) {
            //   var_dump($step['name']);
            Step::Create([
                'name' => $step['name'],
                'body' => $step['body'],
                'post_id' => $post->id,
            ]);
        }

        // タグ
        // $post = new Post;
        // $tags_name = $request->input('tags');
        // $tag_ids = [];
        // foreach ($tags_name as $tag_name) {
        //     if(!empty($tag_name)){
        //          $tag = Tag::firstOrCreate([
        //              'name' => $tag_name,
        //          ]);
        //          $tag_ids[] = $tag->id;
        //      }
        // }
        // // 中間テーブル
        // $post->tags()->attach($tag_ids);
        
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // その時にsessionフラッシュにメッセージを入れる
        return redirect("/post/{$post->id}")->with('flash_message', __('投稿しました!'));
    }


    // 詳細ページ
    public function showstep($id)
    {
        if (Auth::check()) {
            $userAuth = \Auth::user();
            $post = Post::where('id', $id)->first();
            // stepを総取得
            $steps = $post->steps()->get();

            $defaultlikeCount = count($post->likes);
            $defaultstockCount = count($post->stocks);
            $defaultLiked = $post->likes->where('user_id', $userAuth->id)->first();
            if(is_countable($defaultLiked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }
            $defaultStocked = $post->stocks->where('user_id', $userAuth->id)->first();
            if(is_countable($defaultStocked) == 0) {
                $defaultLiked == false;
            } else {
                $defaultLiked == true;
            }

            return view('posts.show', [
            'post' => $post,
            'steps' => $steps,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultStocked' => $defaultStocked,
            'defaultlikeCount' => $defaultlikeCount,
            'defaultstockCount' => $defaultstockCount
            ]);

        }else {
            $post = Post::where('id', $id)->first();
            $steps = $post->steps()->get();
            $defaultlikeCount = count($post->likes);
            $defaultstockCount = count($post->stocks);
            $defaultLiked = $post->likes;
            $defaultStocked = $post->stocks;

            return view('posts.show', [
            'post' => $post,
            'steps' => $steps,
            'defaultLiked' => $defaultLiked,
            'defaultStocked' => $defaultStocked,
            'defaultlikeCount' => $defaultlikeCount,
            'defaultstockCount' => $defaultstockCount
            ]);
        }

    }
    // 投稿編集
    public function edit($id)
    {
        // var_dump($id);

        $post = Post::where('id', $id)->first();
        $steps = $post->steps;
        // var_dump($post);
        // var_dump($steps);
        // var_dump($steps);
        // dd($step);
        // dd($post);

        // viewでモデルの情報を返す
        return view('posts.edit', [
            'post' => $post,
            'steps' => $steps,
        ]);
    }

    public function update(Request $request, $id)
    {
            // 投稿呼び出し
            $post = Post::find($id);
            // $steps = Step::find($id);

            // // post保存
            $post = new Post;
            $post->user_id = auth()->id();
            $post->title = $request->title;
            $post->clearTime = $request->clearTime;
            $post->save();


            // // ステップ保存
            foreach ($request['step'] as $step) {
                //   var_dump($step['name']);    
                $step = new Step;          
                $step->name = $request->$step['name'];
                $step->body = $request->$step['body'];
            }
            $step->save();
            // var_dump($step);
            // dd($step);
            // dump($step);


            // リダイレクト
            return redirect("/post/{$post->id}")->with('flash_message', __('投稿を更新しました!'));

    }

    // 投稿削除
    public function delete(Request $request)
    {
        // Policyのdestructiveメソッドを適用($postは第2引数にあたる)
        // $this->authorize('destructive', $request);
        Post::find($request->id)->delete();
        return redirect()->back()->with('flash_message', __('投稿を削除しました!'));
    }

    public function ogp(Post $post)
    {
        // OGPのサイズ
        $w = 600;
        $h = 315;
        // １行の文字数
        $partLength = 10;

        $fontSize = 30;
        $fontPath = resource_path('font/mushin.otf');

        // 画像を作成
        $image = \imagecreatetruecolor($w, $h);
        // 背景画像を描画
        $bg = \imagecreatefromjpeg(resource_path('/twitter_card.svg'));
        imagecopyresampled($image, $bg, 0, 0, 0, 0, $w, $h, 800, 533);

        // 色を作成
        $white = imagecolorallocate($image, 255, 255, 255);
        $grey = imagecolorallocate($image, 128, 128, 128);

        // 各行に分割
        $parts = [];
        $length = mb_strlen($post->title);
        for ($start = 0; $start < $length; $start += $partLength) {
            $parts[] = mb_substr($post->title, $start, $partLength);
        }

        // テキストの影を描画
        $this->drawParts($image, $parts, $w, $h, $fontSize, $fontPath, $grey, 3);
        // テキストを描画
        $this->drawParts($image, $parts, $w, $h, $fontSize, $fontPath, $white);

        ob_start();
        imagepng($image);
        $content = ob_get_clean();

        // 画像としてレスポンスを返す
        return response($content)
            ->header('Content-Type', 'image/png');
    }
}
