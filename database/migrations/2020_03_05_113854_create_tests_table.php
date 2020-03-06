<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('t_id');
            $table->unsignedBigInteger('t_programm_id');
            $table->string('t_name_ru')->nullable();
            $table->string('t_name_kz')->nullable();
            $table->string('t_name_en')->nullable();
            $table->integer('t_attempts')->unsigned()->default(0);
            $table->integer('t_sort_num')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('t_programm_id')->references('p_id')->on('programms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
