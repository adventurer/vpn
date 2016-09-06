<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vcode', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->string('username');
        $table->string('info')->index();
        $table->bigInteger('status')->index()->default(0);//1 used
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
        Schema::drop('vcode');
    }
}
