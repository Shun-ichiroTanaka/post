<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Like;
use Auth;
use App\Post;

class LikesController extends Controller
{
    public function store(Request $request, $postId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'post_id' => $postId
          )
        );

        $post = Post::findOrFail($postId);

        return redirect()
             ->action('PostController@show', $post->id);
    }

    public function destroy($postId, $likeId) {
      $post = Post::findOrFail($postId);

    //   like_byメソッドは、likesテーブルのなかのuser_idが現在ログインしているidのものを取得
      $post->like_by()->findOrFail($likeId)->delete();

      return redirect()
             ->action('PostController@show', $post->id);
    }
}
