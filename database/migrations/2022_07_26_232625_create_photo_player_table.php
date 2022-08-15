<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_player', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('player_id');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('photo_player');
    }
};
