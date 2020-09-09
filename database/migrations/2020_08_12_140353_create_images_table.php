<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_name');
            $table->string('image_alt_text');
            $table->string('image_original_url');
            $table->string('image_large_url');
            $table->string('image_medium_url');
            $table->string('image_mobile_url');
            $table->string('image_tiny_url');
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')
                ->onDelete('cascade');
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
        Schema::dropIfExists('images');
    }
}
