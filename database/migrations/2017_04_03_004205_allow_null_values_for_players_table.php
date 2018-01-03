<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullValuesForPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('address1')->nullable()->change();
            $table->string('address2')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('zip')->nullable()->change();
            $table->string('home_phone')->nullable()->change();
            $table->string('cell_phone')->nullable()->change();
            $table->string('emergency_contact_name')->nullable()->change();
            $table->string('emergency_contact_phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
        	$table->string('email')->change();
        	$table->string('address1')->change();
        	$table->string('address2')->change();
        	$table->string('city')->change();
        	$table->string('state')->change();
        	$table->string('zip')->change();
        	$table->string('home_phone')->change();
        	$table->string('cell_phone')->change();
        	$table->string('emergency_contact_name')->change();
        	$table->string('emergency_contact_phone')->change();
        });
    }
}
