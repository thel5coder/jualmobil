<?php

namespace App\Http\Controllers;

use App\Repositories\Actions\ImagesLmRepository;
use App\Services\ListingMobilService;
use App\Services\MerkService;
use App\Services\ProvinsiService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ListingMobilController extends Controller
{
    protected $listingService;
    protected $merkService;
    protected $provinsiService;
    protected $imagesListingLm;
    public function __construct(ListingMobilService $listingMobilService , MerkService $merkService,ProvinsiService $provinsiService,ImagesLmRepository $imagesLmRepository)
    {
        $this->listingService = $listingMobilService;
        $this->merkService = $merkService;
        $this->provinsiService = $provinsiService;
        $this->imagesListingLm = $imagesLmRepository;
    }
    public function index()
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
        $data = $this->listingService->read($id)->getResult();
        return view('detailiklan')->with('iklan',$data['iklan'])->with('imageIklan',$data['gambar']);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
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
