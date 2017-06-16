<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jm_kategori_berita')->insert([
            'slug_kategori' => 'berita',
            'kategori' => 'Berita'
        ]);
        \DB::table('jm_kategori_berita')->insert([
            'slug_kategori' => 'spesifikasi',
            'kategori'  => 'Spesifikasi'
        ]);
        \DB::table('jm_kategori_berita')->insert([
            'slug_kategori' => 'review',
            'kategori'  => 'Review'
        ]);
        \DB::table('jm_kategori_berita')->insert([
            'slug_kategori' => 'tips',
            'kategori'  => 'Tips'
        ]);
        \DB::table('jm_kategori_berita')->insert([
            'slug_kategori' => 'galeri',
            'kategori'  => 'Galeri'
        ]);
    }
}
