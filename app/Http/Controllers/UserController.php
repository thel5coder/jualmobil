<?php

namespace App\Http\Controllers;

use App\Services\ProvinsiService;
use App\Services\UserService;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;
    protected $provinsiService;

    public function __construct(UserService $userService,ProvinsiService $provinsiService)
    {
        $this->userService = $userService;
        $this->provinsiService = $provinsiService;
    }
    public function dashboard()
    {
        $provinsi = $this->provinsiService->ShowAll()->getResult();
        return view('dashboard')->with('provinsi',$provinsi);
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
        $this->userService->SetActiveUser($token,$id)->isSuccess();
        return redirect('buatiklan');
    }

    public function update($id)
    {
        $result = $this->userService->Update(Input::all());
        return $this->getJsonResponse($result);

    }
    public function logout()
    {
            auth()->logout();
            return redirect('/');
    }
}
