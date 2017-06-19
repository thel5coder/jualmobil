<?php

namespace App\Http\Controllers;

use App\Services\BeritaService;
use App\Services\ListingMobilService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $listingService,$beritaService;

    public function __construct(ListingMobilService $listingMobilService, BeritaService $beritaService)
    {
        $this->listingService = $listingMobilService;
        $this->beritaService = $beritaService;
    }

    public function index()
    {
        $iklan = $this->listingService->showToHome()->getResult();
        $berita = $this->beritaService->showBeritaToHome()->getResult();
        return view('index')->with('dataIklan',$iklan['iklan'])
                ->with('dataIklanGambar',$iklan['gambarIklan'])
                ->with('dataBerita',$berita['berita'])
                ->with('dataBeritaKategori',$berita['kategori']);
    }
}
