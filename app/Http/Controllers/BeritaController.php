<?php

namespace App\Http\Controllers;

use App\Repositories\Actions\GrupKategoriBeritaRepository;
use App\Services\BeritaService;
use App\Services\GrupKategoriBeritaService;
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
    protected $grupKategoriBeritaService;

    public function __construct(BeritaService $beritaService, KomentarService $komentarService, UserService $userService, KategoriService $kategoriService, GrupKategoriBeritaService $grupKategoriBeritaService)
    {
        $this->beritaService = $beritaService;
        $this->komentarSevice = $komentarService;
        $this->userService = $userService;
        $this->kategoriService = $kategoriService;
        $this->grupKategoriBeritaService = $grupKategoriBeritaService;
    }

    public function index()
    {
        if (auth()->user()->tipe_user == "admin") {
            return view('listberita');
        } else {
            $berita = $this->beritaService->showBerita()->getResult();
            return view('daftarberita')->with('berita', $berita);
        }
    }

    public function showAll()
    {
        //megamenu
        $beritaMegaMenuReview = $this->beritaService->showBeritaByKategori('review', 4)->getResult();
        $beritaMegaMenuTips = $this->beritaService->showBeritaByKategori('tips', 4)->getResult();
        $beritaMegamenuBerita = $this->beritaService->showBeritaByKategori('berita', 3)->getResult();
        $beritaMegamenuSpesifikasi = $this->beritaService->showBeritaByKategori('spesifikasi', 4)->getResult();
        $beritaMegaMenuGaleri = $this->beritaService->showBeritaByKategori('galeri', 10)->getResult();

        $beritaBanner = $this->beritaService->showToBanner()->getResult();
        $berita = $this->beritaService->showAllBerita()->getResult();
        $popularBerita = $this->beritaService->showPopularBerita()->getResult();
        $otherBerita = $this->beritaService->otherBerita()->getResult();
        $tagkategoriCloud = $this->kategoriService->showAll()->getResult();
        return view('berita.index')->with('beritaMegaMenuReview', $beritaMegaMenuReview)
            ->with('beritaMegaMenuTips', $beritaMegaMenuTips)
            ->with('beritaMegaMenuBerita', $beritaMegamenuBerita)
            ->with('beritaMegaMenuSpesifikasi', $beritaMegamenuSpesifikasi)
            ->with('beritaMegaMenuGaleri', $beritaMegaMenuGaleri)
            ->with('beritaBanner', $beritaBanner)
            ->with('berita', $berita['berita'])
            ->with('kategori', $berita['kategori'])
            ->with('popularBerita', $popularBerita)
            ->with('otherBerita', $otherBerita)
            ->with('tagKategori', $tagkategoriCloud);
    }

    public function show($slug)
    {
        //megamenu
        $beritaMegaMenuReview = $this->beritaService->showBeritaByKategori('review', 4)->getResult();
        $beritaMegaMenuTips = $this->beritaService->showBeritaByKategori('tips', 4)->getResult();
        $beritaMegamenuBerita = $this->beritaService->showBeritaByKategori('berita', 3)->getResult();
        $beritaMegamenuSpesifikasi = $this->beritaService->showBeritaByKategori('spesifikasi', 4)->getResult();
        $beritaMegaMenuGaleri = $this->beritaService->showBeritaByKategori('galeri', 10)->getResult();

        //main
        $dataBerita = $this->beritaService->read($slug)->getResult();
        $dataKomentar = $this->komentarSevice->read($dataBerita['berita']->id)->getResult();

        //aside
        $popularBerita = $this->beritaService->showPopularBerita()->getResult();
        $otherBerita = $this->beritaService->otherBerita()->getResult();
        $tagkategoriCloud = $this->kategoriService->showAll()->getResult();

        return view('berita.detail')->with('beritaMegaMenuReview', $beritaMegaMenuReview)
            ->with('beritaMegaMenuTips', $beritaMegaMenuTips)
            ->with('beritaMegaMenuBerita', $beritaMegamenuBerita)
            ->with('beritaMegaMenuSpesifikasi', $beritaMegamenuSpesifikasi)
            ->with('beritaMegaMenuGaleri', $beritaMegaMenuGaleri)
            ->with('dataBerita', $dataBerita['berita'])
            ->with('dataBeritaKategori', $dataBerita['kategori'])
            ->with('otherBerita', $otherBerita)
            ->with('dataKomentar', $dataKomentar)
            ->with('popularBerita', $popularBerita)
            ->with('otherBerita', $otherBerita)
            ->with('tagKategori', $tagkategoriCloud);
    }

    public function read($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        if (auth()->user()->tipe_user == "admin") {
            return view('reviewberita')->with('dataBerita', $dataBerita['berita'])->with('kategori', $dataBerita['kategori']);
        }
        $relatedPost = $this->beritaService->relatedPostBeritaByUser($dataBerita['berita']->user_id)->getResult();
        $otherBerita = $this->beritaService->otherBerita()->getResult();
        $dataKomentar = $this->komentarSevice->read($dataBerita['berita']->id)->getResult();

        return view('detailberita')->with('dataBerita', $dataBerita['berita'])
            ->with('relatedPost', $relatedPost)
            ->with('otherBerita', $otherBerita)
            ->with('dataKomentar', $dataKomentar);
    }

    public function showByKategoriSlug($slug)
    {
        //megamenu
        $beritaMegaMenuReview = $this->beritaService->showBeritaByKategori('review', 4)->getResult();
        $beritaMegaMenuTips = $this->beritaService->showBeritaByKategori('tips', 4)->getResult();
        $beritaMegamenuBerita = $this->beritaService->showBeritaByKategori('berita', 3)->getResult();
        $beritaMegamenuSpesifikasi = $this->beritaService->showBeritaByKategori('spesifikasi', 4)->getResult();
        $beritaMegaMenuGaleri = $this->beritaService->showBeritaByKategori('galeri', 10)->getResult();

        $dataBerita = $this->beritaService->showAllBySlugKategori($slug)->getResult();
        $popularBerita = $this->beritaService->showPopularBerita()->getResult();

        //aside
        $popularBerita = $this->beritaService->showPopularBerita()->getResult();
        $otherBerita = $this->beritaService->otherBerita()->getResult();
        $tagkategoriCloud = $this->kategoriService->showAll()->getResult();

        return view('berita.slug-kategori')->with('beritaMegaMenuReview', $beritaMegaMenuReview)
            ->with('beritaMegaMenuTips', $beritaMegaMenuTips)
            ->with('beritaMegaMenuBerita', $beritaMegamenuBerita)
            ->with('beritaMegaMenuSpesifikasi', $beritaMegamenuSpesifikasi)
            ->with('beritaMegaMenuGaleri', $beritaMegaMenuGaleri)
            ->with('berita', $dataBerita['berita'])
            ->with('kategori', $dataBerita['kategori'])
            ->with('popularBerita', $popularBerita)
            ->with('popularBerita', $popularBerita)
            ->with('otherBerita', $otherBerita)
            ->with('tagKategori', $tagkategoriCloud);
    }

    public function create()
    {
        $kategori = $this->kategoriService->showAll()->getResult();
        return view('buatberita')->with('kategori', $kategori);
    }

    public function store()
    {
        $result = $this->beritaService->create(Input::all());
        return $this->getJsonResponse($result);
    }

    public function edit($slug)
    {
        $dataBerita = $this->beritaService->read($slug)->getResult();
        $dataKategori = $this->kategoriService->showAll()->getResult();
        return view('updateberita')->with('dataBerita', $dataBerita['berita'])->with('kategoriSelectedBerita', $dataBerita['kategori'])->with('dataKategori', $dataKategori);
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
