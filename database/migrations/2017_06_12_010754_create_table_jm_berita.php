<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJmBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_berita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('judul',60);
            $table->text('deskripsi');
            $table->string('images',80);
            $table->integer('views');
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
        Schema::drop('jm_berita');
    }
}
