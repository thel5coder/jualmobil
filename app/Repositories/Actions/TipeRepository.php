<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:50
 */
use App\Models\JmTipe;
class TipeRepository implements \App\Repository\Contract\ITipeRepository
{

    public function create($input)
    {
        $create = new  JmTipe();
        $create->tipe = $input['tipe'];
        return $create->save();

    }

    public function update($input)
    {
        $update = JmTipe::find($input['id']);
        $update->tipe = $input['tipe'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmTipe::find($id)->delete();
    }

    public function read($id)
    {
        return JmTipe::find($id);
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