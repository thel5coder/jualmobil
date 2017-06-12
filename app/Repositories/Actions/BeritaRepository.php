<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:11
 */

namespace App\Repositories\Actions;


use App\Models\JmBerita;
use App\Repositories\Contracts\IBeritaRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class BeritaRepository implements IBeritaRepository
{

    public function create($input)
    {
        $create = new JmBerita();
        $create->user_id = auth()->user()->id;
        $create->judul = $input['judul'];
        $create->slug = str_slug($input['judul'],'-');
        $create->deskripsi = $input['deskripsi'];
        $create->images = $input['images'];
        return $create->save();
    }

    public function update($input)
    {
        $update = JmBerita::find($input['id']);
        $update->user_id = auth()->user()->id;
        $update->judul = $input['judul'];
        $update->slug = str_slug($input['judul'],'-');
        $update->deskripsi = $input['deskripsi'];
        $update->images = $input['images'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmBerita::find($id)->delete();
    }

    public function read($id)
    {
        return JmBerita::find($id);
    }

    public function showAll()
    {
        return JmBerita::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function addView($id)
    {
        // TODO: Implement addView() method.
    }

    public function searchBerita($search)
    {
        // TODO: Implement searchBerita() method.
    }
}