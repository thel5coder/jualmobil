<?php

namespace App\Http\Controllers;

use App\Services\KotaService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KotaController extends Controller
{
    protected $kotaService;

    public function __construct(KotaService $kotaService)
    {
        $this->kotaService = $kotaService;
    }

    public function ShowByProvinsiId($provinsiId)
    {
        $result = $this->kotaService->ShowByProvinsiId($provinsiId);
        return response()->json($result->getResult());
    }
}
