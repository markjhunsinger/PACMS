<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCharacterInfoToCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characters', function ($table) {
            $table->string('character_number');
            $table->integer('build_unspent');
            $table->integer('build_total');
            $table->integer('body');
            $table->integer('deaths');
            $table->integer('pre');
            $table->integer('end');
            $table->integer('foc');
            $table->integer('stress_level');
            $table->string('updated_by');
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
        Schema::table('characters', function ($table) {
            $table->dropColumn('character_number');
            $table->dropColumn('build_unspent');
            $table->dropColumn('build_total');
            $table->dropColumn('body');
            $table->dropColumn('deaths');
            $table->dropColumn('pre');
            $table->dropColumn('end');
            $table->dropColumn('foc');
            $table->dropColumn('stress_level');
            $table->dropColumn('updated_by');
        });
    }
}
