<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:48
 */
namespace App\Repositories\Actions;

use App\Models\JmModel;
use App\Repositories\Contracts\IModelRepository;

class ModelRepository implements IModelRepository
{

    public function create($input)
    {
        $create = new  JmModel();
        $create->model = $input['model'];
        return $create->save();

    }

    public function update($input)
    {
        $update = JmModel::find($input['id']);
        $update->model = $input['model'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmModel::find($id)->delete();
    }

    public function read($id)
    {
        return JmModel::find($id);
    }

    public function showAll()
    {
        return JmModel::all();
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function ShowByMerkId($merkId)
    {
        return JmModel::where('merk_id','=',$merkId)->get();
    }
}