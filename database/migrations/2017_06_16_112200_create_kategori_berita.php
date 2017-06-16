<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_kategori_berita', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug_kategori');
            $table->string('kategori');
            $table->integer('view');
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
        Schema::drop('jm_kategori_berita');
    }
}
