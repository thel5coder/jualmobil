<?php
namespace App\Services;
use App\Events\UserRegister;
use App\Repository\Contract\IUserRepository;
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

    protected function isPasswordValid($password,$email)
    {
        $response = new ServiceResponseDto();
        $response->setResult($this->userRepository->CekPassword($password,$email));
        return $response;
    }

    public function Autentikasi($email,$password)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist($email);
        if ($isEmailExist->getResult())
        {
            $isPasswordValid = $this->isPasswordValid($password,$email);
            if($isPasswordValid->getResult())
            {
                Auth::attempt(['email' => $email ,'password' => $password]);
            }else{
                $message = ['Password Salah'];
                $response->addErrorMessage($message);
            }
        }else{
            $message = ['Email Belum Terdaftar'];
            $response->addErrorMessage($message);
        }
        return $response;
    }

    public function UpdatePassword($password,$id)
    {
        $response = new ServiceResponseDto();
        $this->userRepository->UpdatePassword($password,$id);
        return $response;
    }

    public function Register($input)
    {
        $response = new ServiceResponseDto();
        $isEmailExist = $this->isEmailExist($input['email']);
        if ($isEmailExist->getResult())
        {
            $message = ['Email Sudah Digunakan'];
            $response->addErrorMessage($message);
        }else{
            $fileImage = $this->uploadingFile('images')->getResult();
            $param=[
                'name'      => $input['username'],
                'password'  => $input['password'],
                'email'     => $input['email'],
                'phone'     => $input['phone'],
                'images'    => $fileImage,
                'tipe_user' => $input['tipeUser'],
                'is_active' => '0'
            ];
             if($this->userRepository->create($param)){
                 Event::fire(new UserRegister($input['email']));
             }
             else{
                 $message = ['Gagal Mengirim Validasi Email'];
                 $response->addErrorMessage($message);
             }
        }
        return $response;
    }

    public function CekTokenEmail($token)
    {
        $response = new ServiceResponseDto();
        $email = base64_decode($token);
        if(!$this->userRepository->UpdateUser($email))
        {
            $message = ['gagal merubah data'];
            $response->addErrorMessage($message);
        }
        return $response;
    }

    public function all()
    {
        return $this->getAllObject($this->userRepository);
    }

    public function read($id)
    {
        return $this->readObject($this->userRepository,$id);
    }

    public function delete($id)
    {
        return $this->deleteObject($this->userRepository,$id);
    }
}