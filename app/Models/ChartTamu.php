<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartTamu extends Model
{
    use HasFactory;
    protected $table = 'userdata_tamu';

    public static function countByKehadiran()
    {
        return [
            'hadir' => self::where('status', 'Hadir')->count(),
            'tidak_hadir' => self::where('status', 'Tidak hadir')->count(),
        ];
    }
}
