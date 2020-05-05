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
            $table->string('title')->index();
            //$table->string('original_title')->index()->nullable();
            $table->string('poster');
            $table->string('media_type')->default('movie');
            //$table->string('genre')->nullable();
//            $table->string('rating');
//            $table->integer('released');
//            $table->string('backdrop')->nullable();
//            $table->string('slug')->nullable();
//            $table->text('overview')->nullable();
            $table->boolean('watchlist')->default(false);
//            $table->string('homepage')->nullable();
           // $table->integer('created_at');
            $table->timestamps();
//            $table->timestamp('last_seen_at')->nullable();
//            $table->timestamp('refreshed_at')->nullable();
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
