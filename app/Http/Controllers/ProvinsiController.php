<?php

namespace App\Http\Controllers;

use App\Services\ProvinsiService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProvinsiController extends Controller
{
   protected $provinsiService;

    public function __construct(ProvinsiService $provinsiService)
    {
        $this->provinsiService = $provinsiService;
    }

    public function showAll()
    {
        $result = $this->provinsiService->ShowAll();

        return $this->getJsonResponse($result);
    }
}
