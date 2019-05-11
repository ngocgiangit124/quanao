<?php

namespace App\Http\Controllers\BackEnd;

use Auth,Input,Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view('login', $this->data);
        }
    }
    public function postLogin()
    {
        $rule = [
            'Email' => 'required',
            'Password' => 'required',
        ];
        $validator = Validator::make(
            Input::all(),
            $rule
        );
        if ($validator->fails()) {
            return back()->withErrors("Please enter your info")->withInput();
        }
        $username = Input::get('Email');
        $password = Input::get('Password');


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



        if ($rels['status'] == -1) {
            return back()->withErrors($rels['errors']['message'])->withInput();
        }
        $this->data['user'] = $rels['data'];
        return redirect('/admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
