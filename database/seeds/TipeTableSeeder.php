<?php

use Illuminate\Database\Seeder;

class TipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('jm_tipe')->insert([
            'model_id' => '1',
            'tipe' => 'csx'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '2',
            'tipe' => 'TSM/T'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '3',
            'tipe' => 'D M/T'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '4',
            'tipe' => 'D M/T'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '5',
            'tipe' => 'civic'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '8',
            'tipe' => 'copue'
        ]);
        \DB::table('jm_tipe')->insert([
            'model_id' => '8',
            'tipe' => 'spider'
        ]);
    }
}
