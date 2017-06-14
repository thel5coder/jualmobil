<?php

namespace App\Http\Controllers;

use App\Services\BeritaService;
use App\Services\KomentarService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BeritaController extends Controller
{
    protected $beritaService;
    protected $komentarSevice;

    public function __construct(BeritaService $beritaService,KomentarService $komentarService)
    {
        $this->beritaService = $beritaService;
        $this->komentarSevice = $komentarService;
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

    public function read($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        $relatedPost = $this->beritaService->relatedPostBeritaByUser($dataBerita->user_id)->getResult();
        $otherBerita =  $this->beritaService->otherBerita()->getResult();
        $dataKomentar = $this->komentarSevice->read($dataBerita->id)->getResult();
        return view('detailberita')->with('dataBerita',$dataBerita)
                ->with('relatedPost',$relatedPost)
                ->with('otherBerita',$otherBerita)
                ->with('dataKomentar',$dataKomentar);
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

    public function setStatusBerita()
    {
        $result = $this->beritaService->setStatusBerita(Input::all());
        return $this->getJsonResponse($result);
    }
}
