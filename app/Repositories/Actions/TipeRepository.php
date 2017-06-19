<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:50
 */
namespace App\Repositories\Actions;

use App\Models\JmTipe;
use App\Repositories\Contracts\ITipeRepository;

class TipeRepository implements ITipeRepository
{

    public function create($input)
    {
        $create = new  JmTipe();
        $create->model_id = $input['model'];
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
        return JmTipe::where('id','=',$id)->delete();
    }

    public function read($id)
    {
        return JmTipe::find($id);
    }

    public function showAll()
    {
        return JmTipe::all();
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function ShowModelById($modelId)
    {
        $result = JmTipe::where('model_id','=',$modelId)->get();
        return $result;
    }

    public function deleteByModel($modelId)
    {
        return JmTipe::where('model_id','=',$modelId)->delete();
    }

    public function showWithPaginate()
    {
        return JmTipe::join('jm_model','jm_model.id','=','jm_tipe.model_id')
                ->join('jm_merk','jm_merk.id','=','jm_model.merk_id')
                ->select('jm_tipe.*','jm_model.model','jm_merk.merk')
                ->orderBy('id','desc')
                ->paginate(4);
    }

}