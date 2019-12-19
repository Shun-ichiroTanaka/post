<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Post;

class ChallengeController extends Controller
{

    public function challenge(Post $post, Request $request)
    {
      $challenge = Challenge::create(['post_id' => $post->id, 'user_id' => $request->user_id]);
      $challengeCount = count(Challenge::where('post_id', $post->id)->get());

      return response()->json(['challengeCount' => $challengeCount]);
    }


    public function unchallenge(Post $post, Request $request)
    {
      $challenge = Challenge::where('user_id', $request->user_id)->where('post_id', $post->id)->first();
      $challenge->delete();
      $challengeCount = count(Challenge::where('post_id', $post->id)->get());

      return response()->json(['challengeCount' => $challengeCount]);
    }

}
