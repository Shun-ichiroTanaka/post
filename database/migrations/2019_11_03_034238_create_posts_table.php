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
            // idカラムを作成し、idkラムでは連番で番号をつけていくという意味
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->string('title');

            $table->string('subtitle1');
            $table->string('subtitle2')->nullable();
            $table->string('subtitle3')->nullable();
            $table->string('subtitle4')->nullable();

            $table->string('tag1');
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
            $table->string('tag4')->nullable();
            $table->string('tag5')->nullable();

            $table->text('step1');
            $table->text('step2')->nullable();
            $table->text('step3')->nullable();
            $table->text('step4')->nullable();

            $table->integer('time');

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
