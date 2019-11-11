<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; // fillable使用
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.new');
        // $posts = Post::all();
        // return view('posts.index', ['posts' => $posts]);
    }


    public function new()
    {

    }

    public function poststep(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'subtitles' => 'required|unique:posts|max:255',
            'tags' => 'required|string',
            'steps' => 'required|string',
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

        $steps = explode(' ', $request->steps);
        $step1 = $steps[0];
        $step2 = (isset($steps[1])) ? $steps[1] : null;
        $step3 = (isset($steps[2])) ? $steps[2] : null;
        $step4 = (isset($steps[3])) ? $steps[3] : null;

        $subtites = explode(' ', $request->subtites);
        $subtite1 = $subtites[0];
        $subtite2 = (isset($subtites[1])) ? $subtites[1] : null;
        $subtite3 = (isset($subtites[2])) ? $subtites[2] : null;
        $subtite4 = (isset($subtites[3])) ? $subtites[3] : null;

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

        ]);

        // return redirect('/');

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        // その時にsessionフラッシュにメッセージを入れる
        return redirect("/post/{$step->id}")->with('flash_message', __('投稿しました!'));
    }

    public function showstep($id)
    {
        $steps = Post::paginate(1);

        // IDの情報が飛んできて、$idでキャッチ
        // その記事IDを元に、データベースから記事を検索し、ビューに記事情報を返す
        $step = Post::where('id', $id)->first();
        return view('posts.show', compact('step'));
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
        }
