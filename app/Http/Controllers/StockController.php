<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Post;

class StockController extends Controller
{

    public function stock(Post $post, Request $request)
    {
      $stock = Stock::create([
        'post_id' => $post->id, 
        'user_id' => $request->user_id
      ]);
      $stockCount = count(Stock::where('post_id', $post->id)->get());

      return response()->json(['StockCount' => $stockCount]);
    }


    public function unstock(Post $post, Request $request)
    {
      $stock = Stock::where('user_id', $request->user_id)->where('post_id', $post->id)->first();
      $stock->delete();
      $stockCount = count(Stock::where('post_id', $post->id)->get());

      return response()->json(['StockCount' => $stockCount]);
    }

}

