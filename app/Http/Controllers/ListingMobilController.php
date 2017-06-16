<?php

namespace App\Http\Controllers;

use App\Repositories\Actions\ImagesLmRepository;
use App\Services\KotaService;
use App\Services\ListingMobilService;
use App\Services\MerkService;
use App\Services\ModelService;
use App\Services\ProvinsiService;
use App\Services\TipeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ListingMobilController extends Controller
{
    protected $listingService;
    protected $merkService;
    protected $modelService;
    protected $tipeService;
    protected $provinsiService;
    protected  $kotaService;


    public function __construct(ListingMobilService $listingMobilService , MerkService $merkService,ProvinsiService $provinsiService,ModelService $modelService,TipeService $tipeService, KotaService $kotaService)
    {
        $this->listingService = $listingMobilService;
        $this->merkService = $merkService;
        $this->modelService = $modelService;
        $this->tipeService = $tipeService;
        $this->provinsiService = $provinsiService;
        $this->kotaService = $kotaService;
    }
    public function index()
    {
        if(Auth::check())
        {
            $listingcars = $this->listingService->showIklan()->getResult();
            if(auth()->user()->tipe_user == 'admin')
            {
                return view('listiklanmobil');
            }
            else {
                return view('daftarmobil')
                    ->with('listingcars',$listingcars['iklan'])
                    ->with('listingImage',$listingcars['gambarIklan']);
            }
        }
        else{
            return abort(404);
        }
    }

    public function create()
    {
        $datas = $this->merkService->showAll()->getResult();
        $provinsi = $this->provinsiService->ShowAll()->getResult();
        return view('buatiklan',compact('datas','provinsi'));
    }

    public function store()
    {
        $result = $this->listingService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function read($id)
    {
        $data = $this->listingService->read(base64_decode($id))->getResult();
        return view('detailiklan')->with('iklan',$data['iklan'])->with('imageIklan',$data['gambar']);
    }

    public function setStatusIklan()
    {
        $result = $this->listingService->setStatusIklan(Input::all());

        return $this->getJsonResponse($result);
    }

    public function showAll()
    {
        $data = $this->listingService->ShowAll()->getResult();
        return view('iklan')->with('dataIklan',$data['iklan'])->with('dataImageIklan',$data['gambarIklan']);
    }

    public function show()
    {

    }

    public function edit($id)
    {
        $dataEdit = $this->listingService->read(base64_decode($id))->getResult();
        $merk = $this->merkService->showAll()->getResult();
        $model = $this->modelService->ShowByMerkID($dataEdit['iklan']->merk_id)->getResult();
        $tipe = $this->tipeService->ShowByModelId($dataEdit['iklan']->tipe_id)->getResult();
        $provinsi = $this->provinsiService->ShowAll()->getResult();
        $kota = $this->kotaService->showAll()->getResult();
        return view('updateiklan')
            ->with('dataIklan',$dataEdit['iklan'])
            ->with('imageIklan',$dataEdit['gambar'])
            ->with('merk',$merk)
            ->with('model',$model)
            ->with('tipe',$tipe)
            ->with('provinsi',$provinsi)
            ->with('kota',$kota);
    }

    public function update()
    {
        //
        $result = $this->listingService->update(Input::all());
        return $this->getJsonResponse($result);
    }

    public function destroy($id)
    {
        $result = $this->listingService->delete(base64_decode($id));
        return $this->getJsonResponse($result);
    }

    public function pagination()
    {
        $param = $this->getPaginationParam();
        $result = $this->listingService->pagination($param);
        return $this->parsePaginationResultToGridJson($result);
    }
}
