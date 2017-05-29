<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('players_id');
            $table->string('speed', 3);
            $table->string('control', 1);
            $table->string('stamina', 1);
            $table->text('breaking_ball');
            $table->text('special_ability')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pitchers');
    }
}
