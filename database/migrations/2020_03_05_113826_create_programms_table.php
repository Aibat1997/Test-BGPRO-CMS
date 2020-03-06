<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programms', function (Blueprint $table) {
            $table->bigIncrements('p_id');
            $table->string('p_name_ru')->nullable();
            $table->string('p_name_kz')->nullable();
            $table->string('p_name_en')->nullable();
            $table->integer('p_duration')->unsigned();
            $table->integer('p_cost')->unsigned();
            $table->integer('p_sort_num')->unsigned();
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
        Schema::dropIfExists('programms');
    }
}
