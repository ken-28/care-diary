<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);                        //名前(30文字以内)
            $table->string('name_kana', 30);                   //かな(30文字以内)
            $table->date('birth');                             //生年月日
            $table->integer('sex');                            //性別
            $table->string('job', 10);                         //職業(10文字以内)
            $table->string('image');                           //画像のパス
            $table->boolean('isLeader')->default(false);       //Teamを作成した時、trueとなる。trueの場合、Teamを解散させる権限を持つ。
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_users');
    }
};
