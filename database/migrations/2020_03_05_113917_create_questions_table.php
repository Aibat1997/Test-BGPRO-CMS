<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('q_id');
            $table->unsignedBigInteger('q_test_id');
            $table->text('q_name')->nullable();
            $table->string('q_lang');
            // $table->text('q_name_ru')->nullable();
            // $table->text('q_name_kz')->nullable();
            // $table->text('q_name_en')->nullable();
            $table->boolean('q_is_active')->default(true);
            $table->timestamps();

            $table->foreign('q_test_id')->references('t_id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
