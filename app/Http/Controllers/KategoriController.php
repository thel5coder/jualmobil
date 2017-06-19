<?php

namespace App\Http\Controllers;

use App\Services\KategoriService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KategoriController extends Controller
{
    protected $kategoriService;

    public function __construct(KategoriService $kategoriService)
    {
        $this->kategoriService = $kategoriService;
    }

    public function index()
    {
        $dataKategori = $this->kategoriService->showAllWithPaginate()->getResult();
        return view('kategori')->with('dataKategori',$dataKategori);
    }

    public function store()
    {
        $result = $this->kategoriService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function delete($id)
    {
        $result = $this->kategoriService->delete($id);
        return $this->getJsonResponse($result);
    }


}
