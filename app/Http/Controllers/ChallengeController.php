<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;


class ChallengeController extends Controller
{
    public function index(Post $post, Request $request, $id)
    {
      if (Auth::check()) {
        $userAuth = \Auth::user();
        $post = Post::where('id', $id)->first();

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

        return view('challenge.index', [
        'post' => $post,
        'userAuth' => $userAuth,
        'defaultLiked' => $defaultLiked,
        'defaultStocked' => $defaultStocked,
        'defaultlikeCount' => $defaultlikeCount,
        'defaultstockCount' => $defaultstockCount
        ]);

    }else {
        $post = Post::where('id', $id)->first();
        $defaultlikeCount = count($post->likes);
        $defaultstockCount = count($post->stocks);
        $defaultLiked = $post->likes;
        $defaultStocked = $post->stocks;

        return view('challenge.index', [
        'post' => $post,
        'defaultLiked' => $defaultLiked,
        'defaultStocked' => $defaultStocked,
        'defaultlikeCount' => $defaultlikeCount,
        'defaultstockCount' => $defaultstockCount
        ]);
    }

    }

    // チャレンジの登録ボタン
    public function challenge(Post $post, Request $request)
    {
      $challenge = Challenge::create(['post_id' => $post->id, 'user_id' => $request->user_id]);
      $challengeCount = count(Challenge::where('post_id', $post->id)->get());

      return response()->json(['challengeCount' => $challengeCount]);
    }

    // チャレンジの解除ボタン
    public function unchallenge(Post $post, Request $request)
    {
      $challenge = Challenge::where('user_id', $request->user_id)->where('post_id', $post->id)->first();
      $challenge->delete();
      $challengeCount = count(Challenge::where('post_id', $post->id)->get());

      return response()->json(['challengeCount' => $challengeCount]);
    }

}

