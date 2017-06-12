<?php

namespace App\Http\Controllers;

use App\Services\BeritaService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BeritaController extends Controller
{
    protected $beritaService;

    public function __construct(BeritaService $beritaService)
    {
        $this->beritaService = $beritaService;
    }

    public function index()
    {
        return view('buatberita');
    }

    public function create()
    {
        $result = $this->create(Input::all());
        return $this->getJsonResponse($result);
    }
}
