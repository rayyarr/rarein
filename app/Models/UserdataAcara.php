<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataAcara extends Model
{
    protected $fillable = [
        'users_id',
        'nama_pria',
        'bio_pria',
        'nama_wanita',
        'bio_wanita',
        'tanggal_akad',
        'tanggal_resepsi',
        'tempat_akad',
        'tempat_resepsi',
        'nama_acara',
    ];
    
    protected $table = 'userdata_acara';
}
