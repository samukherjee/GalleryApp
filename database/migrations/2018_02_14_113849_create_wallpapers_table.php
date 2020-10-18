<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallpapers', function (Blueprint $table) {
            $table->id();
            $table->text('filename');
            $table->string('user_id');
            $table->string('width');
            $table->string('height');
            $table->string('size');
            $table->text('original_name');
            $table->integer('views')->default(0);
            $table->integer('status')->default(0);
            // $table->string('total_likes');
            // $table->string('total_favorites');
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
        Schema::dropIfExists('wallpapers');
    }
}
