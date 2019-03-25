<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_speaker', function (Blueprint $table) {
            $table->integer('program_id')->unsigned();
            $table->integer('speaker_id')->unsigned();


            $table->foreign('program_id')->references('id')->on('program');
            $table->foreign('speaker_id')->references('id')->on('speaker');

            $table->primary([
                'program_id',
                'speaker_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_speaker');
    }
}
