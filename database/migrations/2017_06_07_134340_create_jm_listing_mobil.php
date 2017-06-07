<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJmListingMobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_listing_mobil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul',40);
            $table->enum('kondisi',['bekas','baru']);
            $table->integer('merk_id');
            $table->integer('model_id');
            $table->integer('tipe');
            $table->string('plat_nomor',10);
            $table->string('kilo_meter',10);
            $table->enum('bahan_bakar',['bensin','solar','BBG','Hybird']);
            $table->enum('transmisi',['manual','automatic','A/T 2-TRONIC','A/T TIPTRONIC']);
            $table->string('tahun');
            $table->integer('warna');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->integer('lokasi');
            $table->string('kota');
            $table->enum('status',['moderasi','aktif','nonaktif']);
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
        Schema::drop('jm_listing_mobil');
    }
}
