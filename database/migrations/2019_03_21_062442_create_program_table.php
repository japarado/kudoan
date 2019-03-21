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
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('time_from');
            $table->string('time_to');
            $table->string('date_from');
            $table->string('date_to');
            $table->text('objective');
            $table->text('desc');

            $table->timestamps();

            // Indices
            $table->index('name');
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
