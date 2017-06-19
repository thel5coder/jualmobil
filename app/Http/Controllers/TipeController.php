<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use App\Services\TipeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TipeController extends Controller
{
    protected $tipeService;
    protected $modelService;
    public function __construct(TipeService $tipeService,ModelService $modelService)
    {
        $this->tipeService = $tipeService;
        $this->modelService = $modelService;
    }

    public function create()
    {
        $dataModels = $this->modelService->showAll()->getResult();
        $dataTipe = $this->tipeService->showWithPaginate()->getResult();
        return view('tambahtipe',compact('dataModels','dataTipe'));
    }

    public function store()
    {
        $result = $this->tipeService->create(Input::all());

        return $this->getJsonResponse($result);
    }
    public function ShowByModelId($modelId)
    {
        $result = $this->tipeService->ShowByModelId($modelId);

        return response()->json($result->getResult());
    }

    public function delete($id)
    {
        $result = $this->tipeService->delete($id);

        return $this->getJsonResponse($result);
    }
}
