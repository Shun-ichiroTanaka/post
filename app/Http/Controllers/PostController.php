<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $posts = Post::all();
        // return view('posts.index', ['posts' => $posts]);
    }


    public function new()
    {
        return view('posts.new');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'content' => 'required|text',
            // 'publish_at' => 'nullable|date',
            ]);

            // モデルを使って、DBに登録する値をセット
            $posts = new Post;

            // １つ１つ入れる場合
            // $title = $request->get('title');
            // $category_name = $request->get('category_name');
            // $content = $request->get('content');

            // fillを使って一気にいれる
            // $fillableを使っていないと変なデータが入り込んだ場合に勝手にDBが更新されてしまうので注意
            $posts->fill($request->all())->save();

            //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
            // その時にsessionフラッシュにメッセージを入れる
            return redirect('/posts/new')->with('flash_message', __('投稿しました。'));
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Post $posts)
    {
        return view('posts/show');

    }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                //
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, $id)
            {
                //
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
        }
