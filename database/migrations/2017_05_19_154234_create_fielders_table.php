<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fielders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('players_id');
            $table->string('dandou', 1);
            $table->string('meet', 1);
            $table->string('power', 1);
            $table->string('run', 1);
            $table->string('shoulder', 1);
            $table->string('defense', 1);
            $table->string('catch', 1);
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
        Schema::drop('fielders');
    }
}
