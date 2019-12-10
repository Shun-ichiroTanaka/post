<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    // トップページの一覧表示
    public function showTopPage()
    {
        // データベースのpostsテーブルから、作成日時を昇順に並び替えて、全ての情報を取得する
        // postsテーブルには投稿した記事が全て入るので、上のコードでは投稿した記事を全て新しい順に取得
        $userAuth = \Auth::user();
        $articles = Post::orderBy('created_at', 'asc')->paginate(15);
        $articles->load('likes');
        $articles->load('user');

        return view('home', [
            'articles' => $articles,
            'userAuth' => $userAuth
        ]);

        // compactを使うことによってビューに$articleが送られる
        // return view('home', compact('articles'));
    }
}

