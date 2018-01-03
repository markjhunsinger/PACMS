<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('last_name');
        	$table->string('first_name');
        	$table->string('email')->unique();
        	$table->string('address1');
        	$table->string('address2');
        	$table->string('city');
        	$table->string('state');
        	$table->string('zip');
        	$table->string('home_phone');
        	$table->string('cell_phone');
        	$table->string('emergency_contact_name');
        	$table->string('emergency_contact_phone');
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
        Schema::dropIfExists('players');
    }
}
