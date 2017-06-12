<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 14:33
 */

namespace App\Repositories\Actions;

use App\Models\JmListingMobil;
use App\Repositories\Contracts\IListingMobil;
use App\Models\JmImagesLM;
use App\Repositories\Contracts\IListingMobilRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;
use Illuminate\Support\Facades\DB;

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
        $create->tipe = $input['tipe'];
        $create->plat_nomor = $input['platNomor'];
        $create->kilo_meter = $input['kiloMeter'];
        $create->bahan_bakar = $input['bahanBakar'];
        $create->transmisi = $input['transmisi'];
        $create->tahun = $input['tahun'];
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
        $update->judul = $input['judul'];
        $update->kondisi_id = $input['kondisi'];
        $update->merk_id = $input['merk'];
        $update->model_id = $input['model'];
        $update->tipe = $input['tipe'];
        $update->plat_nomor = $input['platNomor'];
        $update->kilo_meter = $input['kiloMeter'];
        $update->bahan_bkar = $input['bahanBakar'];
        $update->transmisi = $input['transmisi'];
        $update->tahun = $input['tahun'];
        $update->warna = $input['warna'];
        $update->deskripsi = $input['deskripsi'];
        $update->provinsi = $input['provinsi'];
        $update->kota = $input['kota'];
        $update->status = 'moderasi';
        $update->save();
    }

    public function delete($id)
    {
        return JmListingMobil::find($id)->delete();
    }

    public function read($id)
    {
        return JmListingMobil::with('merkMobil','modelMobil','tipeMobil')->where('id','=',$id);
    }

    public function showAll()
    {
        return $result = JmListingMobil::paginate('5');
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function showByUserId($userId)
    {
        return JmListingMobil::where('user_id', '=', $userId)->orderBy('id','asc')->paginate('5');
    }

    public function setActiveListingMobil($id)
    {
        // TODO: Implement setActiveListingMobil() method.
    }

    public function setRejectListingMobil($id, $alasan)
    {
        // TODO: Implement setRejectListingMobil() method.
    }
}