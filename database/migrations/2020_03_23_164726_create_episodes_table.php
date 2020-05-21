<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('tmdb_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('season_number')->nullable();;
            $table->integer('season_tmdb_id')->nullable();
            $table->integer('episode_number')->nullable();;
            $table->integer('episode_tmdb_id');
            $table->boolean('seen')->default(0);
            //$table->integer('created_at')->nullable();
            $table->integer('release_episode')->nullable();
            $table->integer('release_season')->nullable();
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
