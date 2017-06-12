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

//        return response()->json($listingcars['gambarIklan']);
        return view('daftarmobil')
            ->with('listingcars',$listingcars['iklan'])
            ->with('listingImage',$listingcars['gambarIklan']);
    }

    public function create()
    {
        $datas = $this->merkService->showAll()->getResult();
        $provinsi = $this->provinsiService->ShowAll()->getResult();
        return view('buatiklan',compact('datas','provinsi'));
    }

    public function store()
    {
        //
        $result = $this->listingService->create(Input::all());
        return $this->getJsonResponse($result);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
}
