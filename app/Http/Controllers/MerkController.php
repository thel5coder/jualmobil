<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\IMerkRepository;
use App\Services\MerkService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MerkController extends Controller
{
    protected $merkService;

    public function __construct(MerkService $merkService)
    {
        $this->merkService = $merkService;
    }

    public function create()
    {
        return view('tambahmerk');
    }
    public function store()
    {
        $result = $this->merkService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function showAll()
    {
        $result = $this->merkService->showAll();

        return $this->getJsonResponse($result);
    }
}
