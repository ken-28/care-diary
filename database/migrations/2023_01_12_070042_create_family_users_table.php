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
        Schema::create('family_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);              //名前(30文字以内)
            $table->string('name_kana', 30);         //かな(30文字以内)
            $table->date('birth');                   //生年月日
            $table->integer('sex');                  //性別
            $table->string('image');                 //画像のパス
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('team_id')->constrained();
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
        Schema::dropIfExists('family_users');
    }
};
