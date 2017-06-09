<?php

use Illuminate\Database\Seeder;

class MerkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('jm_merk')->insert([
           'merk' => 'daihatsu'
        ]);
        \DB::table('jm_merk')->insert([
            'merk' => 'honda'
        ]);
        \DB::table('jm_merk')->insert([
            'merk' => 'cherry'
        ]);
        \DB::table('jm_merk')->insert([
            'merk' => 'ferarri'
        ]);
    }
}
