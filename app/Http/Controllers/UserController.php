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
        $result = $this->userService->Autentikasi(Input::get('email'),Input::get('password'));
        if($result->isSuccess())
        {
            return reedirect('/');
        }
        else{
            return $result->getErrorMessages();
        }
    }

    public function doRegister()
    {
        $result = $this->userService->Register(Input::all());
        if($result->isSuccess())
        {
            //return redirect('/');
        }
        else{
            return $result->getErrorMessages();
        }
    }
    public function  confirmation()
    {

    }
}
