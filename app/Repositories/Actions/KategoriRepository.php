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

    }

    public function update($input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
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


}