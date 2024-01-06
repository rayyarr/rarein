<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserdataTemplate extends Model
{
    protected $fillable = [
        'templates_id',
        'users_id',
        'foto_cover',
        'foto_pria',
        'foto_wanita',
        'status',
        'link',
    ];
    
    protected $table = 'userdata_template';
}
