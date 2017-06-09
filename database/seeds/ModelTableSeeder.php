<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jm_model')->insert([
            'merk_id' => '1',
            'model' => 'taruna'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '1',
            'model' => 'terios'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '1',
            'model' => 'ayla'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '2',
            'model' => 'civic'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '2',
            'model' => 'jazz'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '3',
            'model' => 'easter'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '3',
            'model' => 'transcar'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '4',
            'model' => 'F360'
        ]);
        \DB::table('jm_model')->insert([
            'merk_id' => '4',
            'model' => 'F430'
        ]);
    }
}
