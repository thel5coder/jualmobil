<?php

namespace App\Http\Controllers;

use App\Services\MerkService;
use App\Services\ModelService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ModelController extends Controller
{
    protected $modelService;
    protected $merkService;

    public function __construct(ModelService $modelService, MerkService $merkService)
    {
        $this->merkService = $merkService;
        $this->modelService = $modelService;
    }

    public function create()
    {
        $dataMerks = $this->merkService->showAll()->getResult();
        return view('tambahmodel',compact('dataMerks'));
    }

    public function store()
    {
        $result = $this->modelService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function ShowByMerkId($merkId)
    {
        $result = $this->modelService->ShowByMerkID($merkId);

        return response()->json($result->getResult());
    }

}
