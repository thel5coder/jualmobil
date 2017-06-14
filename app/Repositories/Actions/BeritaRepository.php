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
use App\Repositories\Contracts\Pagination\PaginationResult;

class BeritaRepository implements IBeritaRepository
{

    public function create($input)
    {
        $create = new JmBerita();
        $create->user_id = auth()->user()->id;
        $create->judul = $input['judul'];
        $create->deskripsi_singkat = $input['deskripsiSingkat'];
        $create->slug = str_slug($input['judul'],'-');
        $create->deskripsi = $input['deskripsi'];
        $create->images = $input['images'];
        $create->status = 'moderasi';
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
        $result = new PaginationResult();
        $order = $param->getSortOrder();
        $orderBy = $param->getSortBy();

        $sortBy = (isset($orderBy) ? 'jm_berita.status' : $orderBy);
        $sortOrder = ($order == 'asc' ? 'desc' : $order);

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(
            JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')->count()
        );

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.judul','jm_berita.views','jm_berita.deskripsi_singkat','jm_berita.status')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.judul','jm_berita.views','jm_berita.deskripsi_singkat','jm_berita.status')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.judul','jm_berita.views','jm_berita.deskripsi_singkat','jm_berita.status')
                    ->where(function ($q) use ($param) {
                        $q->where('jm_berita.judul', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jmTipe.status', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.judul','jm_berita.views','jm_berita.deskripsi_singkat','jm_berita.status')
                    ->where(function ($q) use ($param) {
                        $q->where('jm_berita.judul', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jmTipe.status', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function addView($id)
    {
        // TODO: Implement addView() method.
    }

    public function searchBerita($search)
    {
        // TODO: Implement searchBerita() method.
    }

    public function showByUser($userId)
    {
       return JmBerita::where('user_id','=',$userId)->orderBy('id','desc')->paginate(5);
    }


}