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


    public function showTopPage()
    {
        // データベースのpostsテーブルから、作成日時を昇順に並び替えて、全ての情報を取得する
        // postsテーブルには投稿した記事が全て入るので、上のコードでは投稿した記事を全て新しい順に取得
        $articles = Post::orderBy('created_at', 'asc')->get();
        // compactを使うことによってビューに$articlesが送られる
        return view('home', compact('articles'));
    }
}

