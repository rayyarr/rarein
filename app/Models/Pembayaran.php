<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Pembayaran extends Model
{
    protected $table = "Pembayaran";

    protected $fillable = ['users_id', 'nama_pemesan', 'template', 'tanggal_pemesanan', 'jumlah_tagihan', 'metode_pembayaran', 'gambar'];
}