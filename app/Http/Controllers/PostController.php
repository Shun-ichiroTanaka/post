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
        foreach ($request->step as $key => $value) {
            $i = $key;

            $step = Step::create([
                'name' => $request->step[$i]['name'],
                'body' => $request->step[$i]['body'],
                'post_id' => $post->id,
            ]);
            $i++;
            // var_dump($step->name);
            // var_dump($step->body);  
        }
        // var_dump($request);
        // dd($request->all());

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
        
        // var_dump($request);
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
            $post = Post::where('id', $id)->first();
            $step = Step::where('id', $id)->first();

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
            'step' => $step,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultStocked' => $defaultStocked,
            'defaultlikeCount' => $defaultlikeCount,
            'defaultstockCount' => $defaultstockCount
            ]);

        }else {
            $post = Post::where('id', $id)->first();
            $step = Step::where('id', $id)->first();
            $defaultlikeCount = count($post->likes);
            $defaultstockCount = count($post->stocks);
            $defaultLiked = $post->likes;
            $defaultStocked = $post->stocks;

            return view('posts.show', [
            'post' => $post,
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
