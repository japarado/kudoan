<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('admin_id')->unsigned();
            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');
            $table->string('venue')->nullable();
            $table->text('what_is');
            $table->text('objective');
            $table->text('program');
            $table->text('survey_link')->nullable()->default('surveywebsite.com');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('admin_id')->references('user_id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}
