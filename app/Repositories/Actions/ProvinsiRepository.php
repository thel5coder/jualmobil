<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 22:01
 */

namespace App\Repositories\Actions;

use App\Models\JmProvinsi;
use App\Repositories\Contracts\IProvinsiRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class ProvinsiRepository implements IProvinsiRepository
{

    public function create($input)
    {
        $create = new  JmProvinsi();
        $create->lokasi = $input['lokasi'];
        return $create->save();

    }

    public function update($input)
    {
        $update = JmProvinsi::find($input['id']);
        $update->lokasi = $input['lokasi'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmProvinsi::find($id)->delete();
    }

    public function read($id)
    {
        return JmProvinsi::find($id);
    }

    public function showAll()
    {
        return JmProvinsi::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}