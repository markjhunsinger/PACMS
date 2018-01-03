<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAbilityTypeAcronymToAbilityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('ability_types', function (Blueprint $table) {
    		$table->string('ability_type_short')->after('ability_type_name');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('ability_types', function (Blueprint $table) {
    		$table->dropColumn('ability_type_short');
    	});
    }
}
