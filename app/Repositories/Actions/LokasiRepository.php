<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:21
 */
namespace App\Repositories\Actions;

use App\Models\JmProvinsi;
use App\Repositories\Contracts\ILokasiRepository;

class LokasiRepository implements ILokasiRepository
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

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}