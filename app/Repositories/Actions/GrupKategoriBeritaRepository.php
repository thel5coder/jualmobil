<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 19:25
 */

namespace App\Repositories\Actions;

use App\Models\JmGrupBeritaKategori;
use App\Repositories\Contracts\IGrupKategoriBeritaRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class GrupKategoriBeritaRepository implements IGrupKategoriBeritaRepository
{

    public function create($input)
    {
        $create = new JmGrupBeritaKategori();
        $create->berita_id = $input['beritaId'];
        $create->kategori_Id = $input['kategoriId'];
        return $create->save();
    }

    public function update($input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return JmGrupBeritaKategori::where('berita_id', '=', $id)->delete();
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function showGrupKategoriBerita($beritaId)
    {
        return JmGrupBeritaKategori::join('jm_kategori_berita', 'jm_kategori_berita.id', '=', 'jm_grup_kategori_berita.kategori_id')
            ->select('jm_kategori_berita.id', 'jm_kategori_berita.kategori', 'jm_kategori_berita.slug_kategori')
            ->where('jm_grup_kategori_berita.berita_id', '=', $beritaId)
            ->get();
    }

    public function showByKategoriSlug($slug)
    {
        return JmGrupBeritaKategori::join('jm_berita', 'jm_berita.id', '=', 'jm_grup_kategori_berita.berita_id')
            ->join('users','users.id','=','jm_berita.user_id')
            ->join('jm_kategori_berita', 'jm_kategori_berita.id', '=', 'jm_grup_kategori_berita.kategori_id')
            ->select('jm_berita.id','jm_berita.user_id', 'jm_berita.judul', 'jm_berita.slug', 'jm_berita.images', 'jm_berita.created_at',
                'jm_berita.deskripsi_singkat', 'jm_kategori_berita.kategori', 'jm_kategori_berita.slug_kategori')
            ->orderBy('jm_berita.id', 'desc')
            ->where('jm_kategori_berita.slug_kategori', '=', $slug)
            ->paginate(4);
    }

}