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
        Schema::create('diary_comments', function (Blueprint $table) {
            $table->id();
            $table->text('diary_comment', 300);   //コメント(300文字以内)
            $table->string('image');              //画像のパス
            $table->foreignId('diary_id')->constrained();
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
        Schema::dropIfExists('diary_comments');
    }
};
