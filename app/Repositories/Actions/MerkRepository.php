<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:46
 */
use App\Models\JmMerk;
class MerkRepository implements \App\Repository\Contract\IMerkRepository
{

    public function create($input)
    {
        $create = new  JmMerk();
        $create->merk = $input['merk'];
        return $create->save();

    }

    public function update($input)
    {
        $update = JmMerk::find($input['id']);
        $update->merk = $input['merk'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmLokasi::find($id)->delete();
    }

    public function read($id)
    {
        return JmMerk::find($id);
    }

    public function showAll()
    {
        return JmMerk::all();
    }

    public function paginationData(\App\Repository\Contract\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}