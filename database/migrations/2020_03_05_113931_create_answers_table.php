<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('a_id');
            $table->unsignedBigInteger('a_question_id');
            $table->text('a_name_ru')->nullable();
            $table->text('a_name_kz')->nullable();
            $table->text('a_name_en')->nullable();
            $table->boolean('a_is_correct')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('a_question_id')->references('q_id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
