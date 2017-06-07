<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJmImagesListingMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_images_listing_mobil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_mobile_id');
            $table->string('images',60);
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
        Schema::drop('jm_images_listing_mobil');
    }
}
