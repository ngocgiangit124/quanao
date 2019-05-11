<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use App\Repositories\SanPhamRepository;
use App\Repositories\SlideRepository;
use App\Repositories\TheLoaiRepository;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    protected $theloaiRepository;
    protected $slideRepository;
    protected $sanphamRepository;
    public function __construct(SanPhamRepository $sanphamRepository,SlideRepository $slideRepository,TheLoaiRepository $theloaiRepository)
    {
        parent::__construct();
        $this->theloaiRepository =$theloaiRepository;
        $this->slideRepository =$slideRepository;
        $this->sanphamRepository =$sanphamRepository;
    }
    public function index() {
        $theloais = $this->theloaiRepository->index();
        $this->data['theloais'] = $theloais['data'];
        $slides = $this->slideRepository->index();
        $this->data['slides'] = $slides['data'];
        $sanphamNews = $this->sanphamRepository->indexNews();
        $this->data['sanphamNews'] = $sanphamNews['data'];
        $sanphamSale = $this->sanphamRepository->indexSale();
        $this->data['sanphamSale'] = $sanphamSale['data'];
//        dd($this->data);
       return view('front.index',$this->data);
    }
    public function contact() {
        return view('front.contact.contact',$this->data);
    }
    public function about() {
        return view('front.contact.about',$this->data);
    }
    public function login() {
        return view('front.users.login',$this->data);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
        return redirect('/');
    }
    public function registration() {
        $users = new User();
        $users->Ten = Input::get('Name');
        $users->Email = Input::get('Email');
        $users->SDT = Input::get('Phone');
        $users->DiaChi = Input::get('Address');
        $users->Quyen = 'kh';
        $users->Password = bcrypt(Input::get('Password'));
        $users->save();
        return redirect('/');
    }
}
