<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 14:46
 */

namespace App\Repositories\Actions;

use App\Models\JmKota;
use App\Repositories\Contracts\IKotaRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class KotaRepository implements IKotaRepository
{

    public function create($input)
    {
        // TODO: Implement create() method.
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
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function ShowByProvinsiId($provinsiId)
    {
        $result = JmKota::where('id_provinsi','=',$provinsiId)->get();
        return $result;
    }
}