<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataPasangan extends Model
{
    protected $fillable = [
        'pasangan_id',
        'nama_pria',
        'nama_wanita',
        'tanggal_pernikahan',
        'waktu_pernikahan',
        'tempat_pernikahan',
    ];
    
    protected $table = 'userdata_pasangan';
}
