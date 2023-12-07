<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Tamu extends Model
{
    protected $table = "tamu_undangan";

    protected $fillable = ['tamu_id','name','address'];
}