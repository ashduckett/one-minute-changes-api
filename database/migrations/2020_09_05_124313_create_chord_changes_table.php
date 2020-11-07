<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chord_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('to_id');
            $table->foreignId('from_id');
            $table->integer('position')->unsigned();
            $table->timestamps();
            $table->foreign('from_id')->references('id')->on('chords');
            $table->foreign('to_id')->references('id')->on('chords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chord_changes');
    }
}
