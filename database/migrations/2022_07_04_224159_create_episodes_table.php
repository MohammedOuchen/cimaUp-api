<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['movies', 'series']);
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();
            $table->string('categories')->nullable();
            $table->time('duration')->nullable();
            $table->integer('evaluation')->nullable();
            $table->integer('serial_number')->nullable();
            $table->integer('season_number')->nullable();
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
        Schema::dropIfExists('episodes');
    }
}
