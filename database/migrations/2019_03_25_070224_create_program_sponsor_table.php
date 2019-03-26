<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_sponsor', function (Blueprint $table) {
            $table->integer('program_id')->unsigned();
            $table->integer('sponsor_id')->unsigned();

            $table->foreign('program_id')->references('id')->on('program');
            $table->foreign('sponsor_id')->references('id')->on('sponsor');

            $table->primary([
                'program_id',
                'sponsor_id'
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
        Schema::dropIfExists('program_sponsor');
    }
}
