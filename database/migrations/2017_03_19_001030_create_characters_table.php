<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
        	$table->increments('id');
        	$table->unsignedInteger('player_id');
        	$table->string('character_name');
        	$table->unsignedInteger('build_unspent');
        	$table->unsignedInteger('body');
        	$table->unsignedInteger('deaths');
        	$table->unsignedInteger('pre');
        	$table->unsignedInteger('end');
        	$table->unsignedInteger('dex');
        	$table->unsignedInteger('faith');
        	$table->dateTime('last_played');
        	$table->unsignedInteger('rp_points');
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
    	Schema::drop('characters');
    }
}
