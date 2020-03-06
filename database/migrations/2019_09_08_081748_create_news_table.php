<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('news_id');
            $table->string('news_name_ru')->nullable();
            $table->string('news_name_kz')->nullable();
            $table->string('news_name_en')->nullable();
            $table->text('news_short_desc_ru')->nullable();
            $table->text('news_short_desc_kz')->nullable();
            $table->text('news_short_desc_en')->nullable();
            $table->text('news_desc_ru')->nullable();
            $table->text('news_desc_kz')->nullable();
            $table->text('news_desc_en')->nullable();
            $table->string('news_image')->nullable();
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
        Schema::dropIfExists('news');
    }
}
