<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tmdb_id')->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->on(users)->references('id')->onDelete('cascade');
            $table->string('title')->index()->nullable();
            $table->string('poster')->nullable();
            $table->string('media_type')->default('movie');
            $table->boolean('watchlist')->default(false);
            $table->boolean('watched')->default(false);
            $table->timestamps();
//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
