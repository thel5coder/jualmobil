<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:46
 */
namespace App\Repositories\Actions;

use App\Models\JmMerk;
use App\Repositories\Contracts\IMerkRepository;

class MerkRepository implements IMerkRepository
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
        return JmMerk::find($id)->delete();
    }

    public function read($id)
    {
        return JmMerk::find($id);
    }

    public function showAll()
    {
        return JmMerk::orderBy('merk','asc')->get();
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function showMerkWithPaginate()
    {
        return JmMerk::orderBy('merk','desc')->paginate(6);
    }

    public function cekModelByMerkId($merkId)
    {
        return JmMerk::join('jm_model','jm_model.merk_id','=','jm_merk.id')
            ->where('jm_model.merk_id','=',$merkId)
            ->get();
    }


    public function deleteModelByMerkId($merkId)
    {
        return JmMerk::join('jm_model','jm_model.merk_id','=','jm_merk.id')
                ->where('jm_model.merk_id','=',$merkId)
                ->delete();
    }


}