<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBaseCostFlagToSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('skills', function (Blueprint $table) {
    		$table->boolean('is_base_skill')->after('ap_cost');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('skills', function (Blueprint $table) {
    		$table->dropColumn('is_base_skill');
    	});
    }
}
