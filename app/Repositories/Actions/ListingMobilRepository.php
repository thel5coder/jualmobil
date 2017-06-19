<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 14:33
 */

namespace App\Repositories\Actions;

use App\Models\JmListingMobil;
use App\Models\JmImagesLM;
use App\Repositories\Contracts\IListingMobilRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;
use App\Repositories\Contracts\Pagination\PaginationResult;
use DB;

class ListingMobilRepository implements IListingMobilRepository
{

    public function create($input)
    {
        $create = new JmListingMobil();
        $create->judul = $input['judul'];
        $create->user_id = auth()->user()->id;
        $create->kondisi = $input['kondisi'];
        $create->merk_id = $input['merk'];
        $create->model_id = $input['model'];
        $create->tipe_id = $input['tipe'];
        $create->plat_nomor = $input['platNomor'];
        $create->kilo_meter = $input['kiloMeter'];
        $create->bahan_bakar = $input['bahanBakar'];
        $create->transmisi = $input['transmisi'];
        $create->tahun = $input['tahun'];
        $create->harga = $input['harga'];
        $create->warna = $input['warna'];
        $create->deskripsi = $input['deskripsi'];
        $create->provinsi = $input['provinsi'];
        $create->kota = $input['kota'];
        $create->status = 'moderasi';
        $create->save();
        return $create->id;
    }

    public function update($input)
    {
        $update = JmListingMobil::find($input['id']);
        $update->kondisi = $input['kondisi'];
        $update->merk_id = $input['merk'];
        $update->model_id = $input['model'];
        $update->tipe_id = $input['tipe'];
        $update->plat_nomor = $input['platNomor'];
        $update->kilo_meter = $input['kiloMeter'];
        $update->bahan_bakar = $input['bahanBakar'];
        $update->transmisi = $input['transmisi'];
        $update->tahun = $input['tahun'];
        $update->harga = $input['harga'];
        $update->warna = $input['warna'];
        $update->deskripsi = $input['deskripsi'];
        $update->provinsi = $input['provinsi'];
        $update->kota = $input['kota'];
        return $update->save();

    }

    public function delete($id)
    {
        return JmListingMobil::find($id)->delete();
    }

    public function read($id)
    {
        return JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
            ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
            ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
            ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
            ->select('jm_listing_mobil.id', 'jm_listing_mobil.user_id', 'jm_listing_mobil.judul', 'jm_listing_mobil.kondisi',
                'jm_listing_mobil.plat_nomor', 'jm_listing_mobil.kilo_meter', 'jm_listing_mobil.bahan_bakar', 'jm_listing_mobil.transmisi',
                'jm_listing_mobil.tahun', 'jm_listing_mobil.warna', 'jm_listing_mobil.harga', 'jm_listing_mobil.deskripsi',
                'jm_listing_mobil.provinsi', 'jm_listing_mobil.kota', 'jm_listing_mobil.status',
                'jm_merk.merk', 'jm_model.model', 'jm_tipe.tipe', 'jm_listing_mobil.merk_id', 'jm_listing_mobil.model_id', 'jm_listing_mobil.tipe_id',
                'users.name', 'users.phone', 'users.in_wa', 'users.pin_bbm', 'users.facebook' ,'users.email'
            )
            ->where('jm_listing_mobil.id', '=', $id)
            ->first();
    }

    public function showAll()
    {
        return JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
            ->select('jm_listing_mobil.*', 'users.name')
            ->where('status','!=','moderasi')
            ->where('status','!=','nonaktif')
            ->orderBy('jm_listing_mobil.id', 'asc')->paginate(6);
    }

    public function paginationData(PaginationParam $param)
    {
        $result = new PaginationResult();

        $order = $param->getSortOrder();
        $orderBy = $param->getSortBy();

        $sortBy = (isset($orderBy) ? 'jm_listing_mobil.status' : $orderBy);
        $sortOrder = ($order == 'asc' ? 'desc' : $order);

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(
            JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
                ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
                ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
                ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
                ->count()
        );

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
                    ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
                    ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
                    ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
                    ->select('jm_listing_mobil.id', 'jm_listing_mobil.user_id', 'jm_listing_mobil.judul', 'jm_listing_mobil.kondisi',
                        'jm_listing_mobil.plat_nomor', 'jm_listing_mobil.kilo_meter', 'jm_listing_mobil.bahan_bakar', 'jm_listing_mobil.transmisi',
                        'jm_listing_mobil.tahun', 'jm_listing_mobil.warna', 'jm_listing_mobil.harga', 'jm_listing_mobil.deskripsi',
                        'jm_listing_mobil.provinsi', 'jm_listing_mobil.kota', 'jm_listing_mobil.status',
                        'jm_merk.merk', 'jm_model.model', 'jm_tipe.tipe'
                    )
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
                    ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
                    ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
                    ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
                    ->select('jm_listing_mobil.id', 'jm_listing_mobil.user_id', 'jm_listing_mobil.judul', 'jm_listing_mobil.kondisi',
                        'jm_listing_mobil.plat_nomor', 'jm_listing_mobil.kilo_meter', 'jm_listing_mobil.bahan_bakar', 'jm_listing_mobil.transmisi',
                        'jm_listing_mobil.tahun', 'jm_listing_mobil.warna', 'jm_listing_mobil.harga', 'jm_listing_mobil.deskripsi',
                        'jm_listing_mobil.provinsi', 'jm_listing_mobil.kota', 'jm_listing_mobil.status',
                        'jm_merk.merk', 'jm_model.model', 'jm_tipe.tipe'
                    )
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
                    ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
                    ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
                    ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
                    ->select('jm_listing_mobil.id', 'jm_listing_mobil.user_id', 'jm_listing_mobil.judul', 'jm_listing_mobil.kondisi',
                        'jm_listing_mobil.plat_nomor', 'jm_listing_mobil.kilo_meter', 'jm_listing_mobil.bahan_bakar', 'jm_listing_mobil.transmisi',
                        'jm_listing_mobil.tahun', 'jm_listing_mobil.warna', 'jm_listing_mobil.harga', 'jm_listing_mobil.deskripsi',
                        'jm_listing_mobil.provinsi', 'jm_listing_mobil.kota', 'jm_listing_mobil.status',
                        'jm_merk.merk', 'jm_model.model', 'jm_tipe.tipe'
                    )
                    ->where(function ($q) use ($param) {
                        $q->where('jm_listing_mobil.judul', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jm_merk.merk', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jm_model.model', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jmTipe.tipe', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
                    ->join('jm_merk', 'jm_merk.id', '=', 'jm_listing_mobil.merk_id')
                    ->join('jm_model', 'jm_model.id', '=', 'jm_listing_mobil.model_id')
                    ->join('jm_tipe', 'jm_tipe.id', '=', 'jm_listing_mobil.tipe_id')
                    ->select('jm_listing_mobil.id', 'jm_listing_mobil.user_id', 'jm_listing_mobil.judul', 'jm_listing_mobil.kondisi',
                        'jm_listing_mobil.plat_nomor', 'jm_listing_mobil.kilo_meter', 'jm_listing_mobil.bahan_bakar', 'jm_listing_mobil.transmisi',
                        'jm_listing_mobil.tahun', 'jm_listing_mobil.warna', 'jm_listing_mobil.harga', 'jm_listing_mobil.deskripsi',
                        'jm_listing_mobil.provinsi', 'jm_listing_mobil.kota', 'jm_listing_mobil.status',
                        'jm_merk.merk', 'jm_model.model', 'jm_tipe.tipe'
                    )
                    ->where(function ($q) use ($param) {
                        $q->where('jm_listing_mobil.judul', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jm_merk.merk', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jm_model.model', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('jmTipe.tipe', 'like', '%' . $param->getKeyword() . '%');
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

    public function showByUserId($userId)
    {
        return JmListingMobil::where('user_id', '=', $userId)->where('status','!=','nonaktif')->where('status','!=','moderasi')->orderBy('id', 'asc')->paginate('5');
    }

    public function setStatusIklanMobil($input)
    {
        $setReject = JmListingMobil::find($input['id']);
        $setReject->alasan_penolakan = $input['alasan'];
        $setReject->status = $input['status'];
        return $setReject->save();
    }

    public function showToHome()
    {
        return JmListingMobil::join('users', 'users.id', '=', 'jm_listing_mobil.user_id')
            ->select('jm_listing_mobil.*', 'users.name')
            ->where('status', '!=', 'moderasi')
            ->where('status','!=','nonaktif')
            ->orderBy(DB::raw('RAND()'))
            ->first();
    }


}
