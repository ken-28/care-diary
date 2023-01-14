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
        Schema::create('diary_events', function (Blueprint $table) {
            $table->id();
            $table->text('event_content', 300);     //イベントの内容(300文字以内)
            $table->integer('hour');                //何時
            $table->integer('minute');              //何分にイベントを行なったか。
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
        Schema::dropIfExists('diary_events');
    }
};
