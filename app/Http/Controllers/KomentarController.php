<?php

namespace App\Http\Controllers;

use App\Services\KomentarService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KomentarController extends Controller
{
    protected $komentarService;

    public function __construct(KomentarService $komentarService)
    {
        $this->komentarService = $komentarService;
    }

    public function create()
    {
        $result = $this->komentarService->create(Input::all());
        return $this->getJsonResponse($result);

    }
}
