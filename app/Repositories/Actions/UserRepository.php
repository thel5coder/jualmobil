<?php
namespace App\Repositories\Actions;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function create($input)
    {
        $create = new User();
        $create->name = $input['name'];
        $create->email = $input['email'];
        $create->password = $input['password'];
        $create->save();

        return $create->id;
    }

    public function update($input)
    {
        $update = User::find($input['id']);
        $update->name = $input['name'];
        $update->email = $input['email'];
        $update->phone = $input['phone'];
        $update->image = $input['image'];
        $update->tipe_user = $input['tipeUser'];
        return $update->save();
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function read($id)
    {
        return User::find($id);
    }

    public function showAll()
    {
        return User::all();
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function CekEmail($email)
    {
        $result = User::where('email','=',$email)->count();
        return ($result > 0);
    }

    public function CekPassword($password, $email)
    {
//        $result = User::where('email','=',$email)->value('password');
//        return Hash::check($result,$password);
        $result = DB::table('users')->where('email','=',$email)->value('password');
        return \Illuminate\Support\Facades\Hash::check($password,$result);
    }

    public function UpdatePassword($password, $id)
    {
        $update = User::find($id);
        $update->password = $password;
        return $update->save();
    }

    public function SetActiveUser($email)
    {
       return User::where('email','=',$email)
           ->update([
               'is_active'=>1
           ]);
    }

    public function CekStatus($email)
    {
        $result = User::where('email','=',$email)->where('is_status','=','1');
        return ($result == true);
    }
}