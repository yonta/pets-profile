<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            //↓ここミス
             $table->string('main_URL')->
             default('https://1.bp.blogspot.com/-R_8W_NcubL4/XQjt6FQkMzI/AAAAAAABTNo/J0gCt6jDXsYC3pg_UdL57p1zGwVHFPoIACLcBGAs/s800/animalface_suzume.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
              $table->dropColumn('main_URL');
        });
    }
}
