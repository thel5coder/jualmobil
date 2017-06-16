<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupKategoriBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_grup_kategori_berita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('berita_id');
            $table->integer('kategori_id');
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
        Schema::drop('jm_grup_kategori_berita');
    }
}
