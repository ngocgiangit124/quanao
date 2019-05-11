<?php namespace App\Repositories;

use Auth,Input,Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class UserRepository {
    public function  loginEmail($username,$password){
        $credentials = ['Email' => $username, 'password' => $password ];
        $check = Auth::attempt($credentials);

        if (!$check) {
            $rels = array(
                'status' => -1,
                'errors' => ['message'=>'Id, email or password is invalid'],
            );
        } else {
            $user = Auth::User();
            if ($user->Status == 0) {
                $rels = array(
                    'status' => -1,
                    'errors' => ['message'=>'Your account has been bloked'],
                );
            } else {
                $rels = array(
                    'status' => 200,
                    'data' => $user->getArrayInfo(),
                );
            }
        }
        return $rels;
    }
}