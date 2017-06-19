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

    public function index()
    {
        $merk = $this->merkService->showMerkWithPaginate()->getResult();
        return view('merk')->with('dataMerk',$merk);
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

    public function delete($id)
    {
        $result = $this->merkService->delete($id);

        return $this->getJsonResponse($result);
    }
}
