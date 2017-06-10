<?php

namespace App\Http\Controllers;

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
    public function __construct(ListingMobilService $listingMobilService , MerkService $merkService,ProvinsiService $provinsiService)
    {
        $this->listingService = $listingMobilService;
        $this->merkService = $merkService;
        $this->provinsiService = $provinsiService;
    }
    public function index()
    {
        $listingcar;
        return view('daftarmobil');
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
        //
    }
}
