<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('skills', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('skill_name');
    		$table->string('skill_description');
    		$table->text('spheres');
    		$table->unsignedInteger('build_cost');
    		$table->unsignedInteger('ap_type_id');
    		$table->unsignedInteger('ap_cost');
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
    	Schema::drop('skills');
    }
}
