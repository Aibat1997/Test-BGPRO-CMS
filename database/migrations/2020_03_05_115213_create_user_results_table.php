<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_results', function (Blueprint $table) {
            $table->unsignedBigInteger('ur_user_id');
            $table->unsignedBigInteger('ur_test_id');
            $table->integer('ur_score')->unsigned();
            $table->timestamps();

            $table->foreign('ur_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('ur_test_id')->references('t_id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_results');
    }
}
