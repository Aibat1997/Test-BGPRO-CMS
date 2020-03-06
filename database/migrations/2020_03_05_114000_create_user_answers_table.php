<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('ua_user_id');
            $table->unsignedBigInteger('ua_question_id');
            $table->unsignedBigInteger('ua_answer_id');
            $table->boolean('ua_is_correct')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('ua_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('ua_question_id')->references('q_id')->on('questions');
            $table->foreign('ua_answer_id')->references('a_id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
