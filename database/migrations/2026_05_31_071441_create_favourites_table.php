<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
        * This table is more like a metadata storage, this way, i dont have to always perfom 
        * http requests just to get these details 
        */

        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('movie_id');
            $table->string('title');
            $table->string('poster_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourites');
    }
};
