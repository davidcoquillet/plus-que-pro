<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run.
     */
    public function up(): void
    {
        if(!Schema::hasTable('movies')) {
            Schema::create('movies', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->bigInteger('moviedb_id')->unsigned()->unique();
                $table->string('backdrop_path');
                $table->string('original_title');
                $table->text('overview');
                $table->string('poster_path');
                $table->boolean('adult');
                $table->string('title');
                $table->tinyText('original_language');
                $table->float('popularity');
                $table->dateTime('release_date');
                $table->boolean('video');
                $table->float('vote_average');
                $table->float('vote_count');
            });
        }

    }

    /**
     * Reverse.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
