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
        $berita = $this->beritaService->showBerita()->getResult();
        if(auth()->user()->tipe_user == 'admin')
        {
            return view('listberita');
        }
        else{
            return view('daftarberita')->with('berita',$berita  );
        }
    }

    public function read($id)
    {
        $dataBerita = $this->beritaService->read(base64_decode($id));
        return view('detailberita')->with('dataBerita',$dataBerita);
    }

    public function create()
    {
        return view('buatberita');
    }

    public function store()
    {
        $result = $this->beritaService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function destroy($id)
    {
        $result = $this->beritaService->delete(base64_decode($id));
        return $this->getJsonResponse($result);
    }

    public function pagination()
    {
        $param = $this->getPaginationParam();
        $result = $this->beritaService->pagination($param);
        return $this->parsePaginationResultToGridJson($result);
    }

}
