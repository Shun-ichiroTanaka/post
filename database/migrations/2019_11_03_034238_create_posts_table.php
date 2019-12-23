<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * up : マイグレーションが実行されるときに処理をする
     * upメソッドにはマイグレーションで実行したいことを記述
     * @return void
     */
    public function up()
    {
        // postsテーブルを以下の条件で作りますよ！
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('clearTime');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // 自動でcreated_atとupdated_atの2つのカラムを用意
            $table->timestamps();
        });
    }

    /**
     * down : マイグレーションがロールバックされるときに処理をする
     * 万が一将来ロールバックしたときにデータベースを元に戻すために、downメソッドにはupメソッドと逆の記述をする
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
