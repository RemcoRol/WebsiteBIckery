<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_images', function (Blueprint $table) {
            $table->id();
            $table->string('brand_image_alt_text');
            $table->string('brand_image_original_url');
            $table->string('brand_image_large_url');
            $table->string('brand_image_medium_url');
            $table->string('brand_image_mobile_url');
            $table->string('brand_image_tiny_url');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')
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
        Schema::dropIfExists('brand_images');
    }
}
