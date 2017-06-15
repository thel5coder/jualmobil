<?php
namespace App\Services;

use App\Events\UserRegister;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class UserService extends BaseService
{
    protected $userRepository;

    public function __construct(IUserRepository $user)
    {
        $this->userRepository = $user;
    }

    protected function isEmailExist($email)
    {
        $response = new ServiceResponseDto();
        $response->setResult($this->userRepository->CekEmail($email));
        return $response;
    }

    protected function isPasswordValid($password, $email)
    {
        $response = new ServiceResponseDto();
        $response->setResult($this->userRepository->CekPassword($password, $email));
        return $response;
    }

    protected function isStatusActive($email)
    {
        $response = new ServiceResponseDto();
        $response->setResult($this->userRepository->CekStatus($email));
        return $response;
    }

    public function Autentikasi($email, $password)
    {
        $response = new ServiceResponseDto();
        $isStatusActive = $this->isStatusActive($email);
        if ($isStatusActive->getResult()) {
            $isEmailExist = $this->isEmailExist($email);
            if ($isEmailExist->getResult()) {
                $isPasswordValid = $this->isPasswordValid($password, $email);
                if ($isPasswordValid->getResult()) {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                } else {
                    $message = ['Password Salah'];
                    $response->addErrorMessage($message);
                }
            } else {
                $message = ['Email Belum Terdaftar'];
                $response->addErrorMessage($message);
            }
        } else {
            $message = ['Akun Anda Belum Aktif , Silahkan Cek Email Anda '];
            $response->addErrorMessage($message);
        }
        return $response;
    }

    public function UpdatePassword($password, $id)
    {
        $response = new ServiceResponseDto();
        $this->userRepository->UpdatePassword($password, $id);
        return $response;
    }

    public function Update($input)
    {
        $response = new ServiceResponseDto();
        if ($input['id'] == '') {
            $message = ['id kosong'];
            $response->addErrorMessage($message);
        }
        else{
            $fileImage = $this->uploadingFile('imageAvatar');
            $param=[
                'id'        => $input['id'],
                'name'      => (isset($input['name']) ? $input['name'] : ''),
                'provinsi'  => (isset($input['provinsi'])) ? $input['provinsi'] : '',
                'kota'      => (isset($input['kota'])) ? $input['kota'] : '',
                'telepone'  => (isset($input['telepone'])) ? $input['telepone'] : '',
                'pinBbm'    => (isset($input['pinBbm'])) ? $input['pinBbm'] : '',
                'inWa'      => $input['inWa'],
                'facebook'  => (isset($input['facebook'])) ? $input['facebook'] : '',
                'image'  => (isset($input['image'])) ? $fileImage : '',
            ];

            $this->userRepository->update($param);
        }
        return $response;
    }

    public function CekNameSlug($slug)
    {
        $response = new ServiceResponseDto();
        if(Auth::check())
        {
            $response->setResult($this->userRepository->CekNameSlug($slug,auth()->user()->id));
        }
        return $response;
    }

    public function Register($input)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist($input['email']);
        if ($isEmailExist->getResult()) {
            $message = ['Email Sudah Digunakan'];
            $response->addErrorMessage($message);
        } else {
            $param = [
                'name' => $input['name'],
                'password' => bcrypt($input['password']),
                'email' => $input['email'],
                'tipeUser' => $input['tipeUser']
            ];
            $result = $this->userRepository->create($param);
            if ($result) {
                Event::fire(new UserRegister($input['email'], $input['name'], $result));
            } else {
                $message = ['Registrasi gagal'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function SetActiveUser($token, $id)
    {
        $response = new ServiceResponseDto();
        $email = base64_decode($token);

        if (!$this->userRepository->SetActiveUser($email)) {
            $message = ['gagal mengaktifkan user'];
            $response->addErrorMessage($message);
        }
        Auth::loginUsingId(base64_decode($id));

        return $response;
    }

    public function all()
    {
        return $this->getAllObject($this->userRepository);
    }

    public function read($id)
    {
        return $this->readObject($this->userRepository, $id);
    }

    public function delete($id)
    {
        return $this->deleteObject($this->userRepository, $id);
    }

}