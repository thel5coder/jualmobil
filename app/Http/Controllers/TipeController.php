<?php

namespace App\Http\Controllers;

use App\Services\TipeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipeController extends Controller
{
    protected $tipeService;

    public function __construct(TipeService $tipeService)
    {
        $this->tipeService = $tipeService;
    }

    public function ShowByModelId($modelId)
    {
        $result = $this->tipeService->ShowByModelId($modelId);

        return response()->json($result->getResult());
    }
}
