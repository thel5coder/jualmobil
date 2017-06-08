<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function dashboard()
    {
        return view('dashboard')->with('message','halo');
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
        $result = $this->userService->Autentikasi(Input::get('email'),Input::get('password'));
        return $this->getJsonResponse($result);
    }

    public function doRegister()
    {
        $result = $this->userService->Register(Input::all());

        return $this->getJsonResponse($result);
    }
    public function  confirmation($token,$id)
    {
        $result = $this->userService->SetActiveUser($token,$id);
        if($result->isSuccess())
        {
            return redirect('buatiklan');
        }
    }
    public function logout()
    {
            auth()->logout();
            return redirect('/');
    }
}
