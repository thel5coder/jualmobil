<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJmDealerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jm_dealer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dealer');
            $table->text('alamat');
            $table->string('keterangan');
            $table->integer('lokasi');
            $table->string('kota');
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
        Schema::drop('jm_dealer');
    }
}
