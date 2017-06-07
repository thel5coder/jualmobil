<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function doLogin()
    {
        $response = $this->userService->Autentikasi(Input::get('email'),Input::get('password'));

        return $this->getJsonResponse($response);
    }

    public function doRegister()
    {
        $response = $this->userService->Register(Input::all());


    }
}
