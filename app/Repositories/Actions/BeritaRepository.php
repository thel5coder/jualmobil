<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:11
 */

namespace App\Repositories\Actions;


use App\Models\JmBerita;
use App\Models\JmGrupBeritaKategori;
use App\Repositories\Contracts\IBeritaRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;
use App\Repositories\Contracts\Pagination\PaginationResult;
use DB;

class BeritaRepository implements IBeritaRepository
{

    public function create($input)
    {
        $create = new JmBerita();
        $create->user_id = $input['userId'];
        $create->judul = $input['judul'];
        $create->deskripsi_singkat = $input['deskripsiSingkat'];
        $create->slug = $input['slug'];
        $create->deskripsi = $input['deskripsi'];
        $create->images = $input['images'];
        $create->status = 'moderasi';
        $create->save();

        return $create->id;
    }

    public function update($input)
    {
        $update = JmBerita::find($input['id']);
        $update->judul = $input['judul'];
        $update->slug = $input['slug'];
        $update->deskripsi_singkat = $input['deskripsiSingkat'];
        $update->deskripsi = $input['deskripsi'];
        $update->images = $input['images'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmBerita::find($id)->delete();
    }

    public function read($slug)
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->select('jm_berita.*', 'users.name', 'users.image', 'users.email')
            ->where('slug', '=', $slug)
            ->first();
    }

    public function showAll()
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.slug', 'jm_berita.deskripsi_singkat', 'jm_berita.images', 'jm_berita.created_at', 'users.name')
            ->where('status', '!=', 'moderasi')
            ->take(3)
            ->get();
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
                    ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.views', 'jm_berita.deskripsi_singkat', 'jm_berita.status', 'jm_berita.slug')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.views', 'jm_berita.deskripsi_singkat', 'jm_berita.status', 'jm_berita.slug')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.views', 'jm_berita.deskripsi_singkat', 'jm_berita.status', 'jm_berita.slug')
                    ->where(function ($q) use ($param) {
                        $q->where('jm_berita.judul', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jmTipe.status', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
                    ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.views', 'jm_berita.deskripsi_singkat', 'jm_berita.status', 'jm_berita.slug')
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
        return JmBerita::where('user_id', '=', $userId)->orderBy('id', 'desc')->paginate(5);
    }

    public function relatedPostBeritaByUser($userId)
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->select('jm_berita.*', 'users.name', 'users.image')
            ->orderBy('jm_berita.id', 'desc')
            ->where('users.id', '=', $userId)
            ->where('status', '!=', 'moderasi')
            ->take(2)
            ->get();
    }

    public function otherBerita()
    {
        return JmBerita::orderBy('id', 'desc')->where('status', '!=', 'moderasi')->take(3)->get();
    }

    public function setStatusBerita($input)
    {
        $setStatus = JmBerita::find($input['id']);
        $setStatus->alasan_penolakan = $input['alasan'];
        $setStatus->status = $input['status'];
        return $setStatus->save();
    }

    public function showToBanner()
    {
        return JmBerita::orderBy('id', 'desc')->where('status', '!=', 'moderasi')->take(4)->get();
    }

    public function showPopularBerita()
    {
        return JmBerita::orderBy('views', 'desc')->where('status', '!=', 'moderasi')->take(6)->get();
    }

    public function GetUserPost($userId)
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->select('users.name', 'jm_berita.judul')
            ->where('jm_berita.user_id', '=', $userId)
            ->get();
    }

    public function showBySlugKategori($slug)
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->join('jm_grup_kategori_berita', 'jm_grup_kategori_berita.berita_id', '=', 'jm_berita.id')
            ->join('jm_kategori_berita', 'jm_kategori_berita.id', '=', 'jm_grup_kategori_berita.kategori_id')
            ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.slug', 'jm_berita.deskripsi_singkat', 'jm_berita.images', 'jm_berita.created_at', 'users.name')
            ->where('status', '!=', 'moderasi')
            ->where('jm_kategori_berita.slug_kategori', '=', $slug)
            ->paginate(4);
    }

    public function showBeritaByKategori($kategori)
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->join('jm_grup_kategori_berita', 'jm_grup_kategori_berita.berita_id', '=', 'jm_berita.id')
            ->join('jm_kategori_berita', 'jm_kategori_berita.id', '=', 'jm_grup_kategori_berita.kategori_id')
            ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.slug', 'jm_berita.deskripsi_singkat', 'jm_berita.images', 'jm_berita.created_at', 'users.name')
            ->where('status', '!=', 'moderasi')
            ->where('jm_kategori_berita.kategori', '=', $kategori)
            ->take(3)
            ->get();
    }

    public function showBeritaToHome()
    {
        return JmBerita::join('users', 'users.id', '=', 'jm_berita.user_id')
            ->join('jm_grup_kategori_berita', 'jm_grup_kategori_berita.berita_id', '=', 'jm_berita.id')
            ->join('jm_kategori_berita', 'jm_kategori_berita.id', '=', 'jm_grup_kategori_berita.kategori_id')
            ->select('jm_berita.id', 'jm_berita.judul', 'jm_berita.slug', 'jm_berita.deskripsi_singkat', 'jm_berita.images', 'jm_berita.created_at', 'users.name')
            ->where('status', '!=', 'moderasi')
            ->orderBy(DB::raw('RAND()'))
            ->take(3)
            ->get();
    }
}