<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{

    protected $table = 'KhuyenMai';
    protected  $primaryKey = 'KhuyenMaiId';
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

}
