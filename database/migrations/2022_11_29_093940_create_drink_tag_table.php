<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drink_id');
            $table->unsignedBigInteger('tag_id');

            // $table->foreign('drink_id')
            // ->references('id')
            // ->on('drinks')
            // ->onDelete('cascade');
            // $table->foreign('tag_id')
            // ->references('id')
            // ->on('tags')
            // ->onDelete('cascade');
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
        Schema::dropIfExists('drink_tag');
    }
}
