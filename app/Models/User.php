<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';
    protected $dates = ['Deleted_at'];
    protected $table = 'NguoiDung';
    protected  $primaryKey = 'NguoiDungId';
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    protected $fillable = [
        'Ten', 'Email', 'Password','remember_token',
    ];

//    protected $hidden = [
//        'Password', 'remember_token',
//    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->NguoiDungId,
            "Code"     => $this->Code,
            "Email"      => $this->Email,
            "Name"       => $this->Ten,
            "Phone"       => $this->SDT,
            "Avatar"    => $this->getAvatars(),
            "Quyen"  => $this->Quyen,
            'DiaChi' => $this->DiaChi,
//            "Commets" => ''
        );
        return $rels;
    }

    public function getAvatar($size = '') {
        if ($this->Avatar == '') {
            return env("HOME_PAGE").'/img/profile_default.png';
        } else {
            $date_dir_name = md5(date_format($this->CreatedAt, 'm-Y'));
            if($size) {
                return env("IMAGE_URL").'/avatars/'.$date_dir_name.'/'.$this->Avatar.'_'.$size.'.png';
            } else {
                return env("IMAGE_URL").'/avatars/'.$date_dir_name.'/'.$this->Avatar.'.png';
            }
        }
    }

    public function getAvatars() {
        $data = [];
        if ($this->Avatar) {
            $date_dir_name = md5(date_format($this->CreatedAt, 'm-Y'));
            $data['Small'] = env("IMAGE_URL") . '/avatars/' . $date_dir_name . '/' . $this->Avatar . '_100x100.png';
            $data['Medium'] = env("IMAGE_URL") . '/avatars/' . $date_dir_name . '/' . $this->Avatar . '_200x200.png';
            $data['Large'] = env("IMAGE_URL") . '/avatars/' . $date_dir_name . '/' . $this->Avatar . '.png';
        } else {
            $data['Small'] = env("HOME_PAGE").'/img/profile_default.png';
            $data['Medium'] = env("HOME_PAGE").'/img/profile_default.png';
            $data['Large'] = env("HOME_PAGE").'/img/profile_default.png';
        }

        return $data;
    }
    public function hoadons() {
        return $this->hasMany('App\Models\Hoadon','NguoiDungId','NguoiDungId');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
//
//    /**
//     * The attributes that should be cast to native types.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
