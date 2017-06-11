<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\IMerkRepository;
use App\Services\MerkService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MerkController extends Controller
{
    protected $merkService;

    public function __construct(MerkService $merkService)
    {
        $this->merkService = $merkService;
    }

    public function showAll()
    {
        $result = $this->merkService->showAll();

        return $this->getJsonResponse($result);
    }
}
