<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    protected $modelService;

    public function __construct(ModelService $modelService)
    {
        $this->modelService = $modelService;
    }

    public function ShowByMerkId($merkId)
    {
        $result = $this->modelService->ShowByMerkID($merkId);

        return response()->json($result->getResult());
    }
}
