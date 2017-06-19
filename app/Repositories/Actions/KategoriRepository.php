<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 18:36
 */

namespace App\Repositories\Actions;

use App\Models\JmKategori;
use App\Models\JmGrupBeritaKategori;
use App\Repositories\Contracts\IKategoriRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class KategoriRepository implements IKategoriRepository
{

    public function create($input)
    {
        $create = new JmKategori();
        $create->slug_kategori = $input['slug_kategori'];
        $create->kategori = $input['kategori'];
        return $create->save();
    }

    public function update($input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
       return JmKategori::find($id)->delete();
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function showAll()
    {
       return JmKategori::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function showAllWithPaginate()
    {
       return JmKategori::orderBy('id','desc')->paginate(4);
    }


}