<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id'); //ペットID
            $table->unsignedBigInteger('user_id');//ユーザーID
            $table->unsignedBigInteger('breed_id');//種類ID
            $table->string('name');//名前
            $table->string('birthday');//誕生日
            $table->string('sex');//性別
            $table->string('introduction');//紹介文
            $table->unsignedBigInteger('cute_count');//かわいいね数
            
            $table->timestamps();
            
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('breed_id')->references('id')->on('breeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
