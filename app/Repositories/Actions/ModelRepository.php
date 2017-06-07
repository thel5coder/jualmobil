<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:48
 */
use App\Models\JmModel;
class ModelRepository implements \App\Repository\Contract\Pagination\IModelRepository
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
        return JmMerk::all();
    }

    public function paginationData(\App\Repository\Contract\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}