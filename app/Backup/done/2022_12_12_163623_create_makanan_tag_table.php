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
        Schema::create('makanan_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('makanan_id')->unsigned();
            $table->foreign('makanan_id')->references('id')->on('makanan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makanan_tag');
    }
};
