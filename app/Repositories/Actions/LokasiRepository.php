<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:21
 */

use App\Models\JmLokasi;
class LokasiRepository implements \App\Repository\Contract\ILokasiRepository
{

    public function create($input)
    {
        $create = new  JmLokasi();
        $create->lokasi = $input['lokasi'];
        return $create->save();

    }

    public function update($input)
    {
        $update = JmLokasi::find($input['id']);
        $update->lokasi = $input['lokasi'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmLokasi::find($id)->delete();
    }

    public function read($id)
    {
        return JmLokasi::find($id);
    }

    public function showAll()
    {
        return JmLokasi::all();
    }

    public function paginationData(\App\Repository\Contract\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}