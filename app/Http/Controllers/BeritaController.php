<?php

namespace App\Http\Controllers;

use App\Services\BeritaService;
use App\Services\KategoriService;
use App\Services\KomentarService;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BeritaController extends Controller
{
    protected $beritaService;
    protected $komentarSevice;
    protected $userService;
    protected $kategoriService;

    public function __construct(BeritaService $beritaService,KomentarService $komentarService, UserService $userService, KategoriService $kategoriService)
    {
        $this->beritaService = $beritaService;
        $this->komentarSevice = $komentarService;
        $this->userService = $userService;
        $this->kategoriService = $kategoriService;
    }

    public function index()
    {
        if(auth()->user()->tipe_user == "admin")
        {
            return view('listberita');
        }
        else{
            $berita = $this->beritaService->showBerita()->getResult();
            return view('daftarberita')->with('berita',$berita  );
        }
    }

    public function showAll()
    {
            $beritaBanner = $this->beritaService->showToBanner()->getResult();
            $popularBerita = $this->beritaService->showPopularBerita()->getResult();
            $berita = $this->beritaService->showAllBerita()->getResult();
            return view('berita')->with('berita',$berita['berita'])
                    ->with('kategori',$berita['kategori'])
                    ->with('beritaBanner',$beritaBanner)
                    ->with('popularBerita',$popularBerita);
    }

    public function show($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        $relatedPost = $this->beritaService->relatedPostBeritaByUser($dataBerita['berita']->user_id)->getResult();
        $otherBerita =  $this->beritaService->otherBerita()->getResult();
        $dataKomentar = $this->komentarSevice->read($dataBerita['berita']->id)->getResult();
        return view('detailberita')->with('dataBerita',$dataBerita['berita'])
            ->with('relatedPost',$relatedPost)
            ->with('otherBerita',$otherBerita)
            ->with('dataKomentar',$dataKomentar);
    }

    public function read($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        $relatedPost = $this->beritaService->relatedPostBeritaByUser($dataBerita['berita']->user_id)->getResult();
        $otherBerita =  $this->beritaService->otherBerita()->getResult();
        $dataKomentar = $this->komentarSevice->read($dataBerita['berita']->id)->getResult();
        return view('detailberita')->with('dataBerita',$dataBerita['berita'])
                ->with('relatedPost',$relatedPost)
                ->with('otherBerita',$otherBerita)
                ->with('dataKomentar',$dataKomentar);
    }

    public function create()
    {
        $kategori =$this->kategoriService->showAll()->getResult();
        return view('buatberita')->with('kategori',$kategori);
    }

    public function store()
    {
        $result = $this->beritaService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function edit($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        return view('updateberita')->with('dataBerita',$dataBerita['berita'])->with('kategori',$dataBerita['kategori']);
    }

    public function update()
    {
        $result = $this->beritaService->update(Input::all());
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
