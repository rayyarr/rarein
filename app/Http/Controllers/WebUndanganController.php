<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\UserDataAcara;
use App\Models\UserdataTemplate;
use App\Models\UserdataPembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class WebUndanganController extends Controller
{
    public function index($id){    
        return view('template.' . $id);
    }

    public function play($id){
        //$data = UserDataAcara::where('users_id', $userId)->first();
        $data = DB::table('userdata_template')
        ->join('userdata_acara', 'userdata_template.users_id', '=', 'userdata_acara.users_id')
        ->select('userdata_template.*', 'userdata_acara.*')
        ->where('userdata_template.link', $id)
        ->first();
        $id_template = $data->templates_id;

        if ($data) {
            return view('template.' . $id_template, compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }
    }

    public function create($id)
    {
        $userId = Auth::user()->id;
        $data = UserDataAcara::where('users_id', $userId)->first();
        $dataTemplate = UserdataTemplate::where('users_id', $userId)->where('templates_id', $id)->first();
        $cekTemplateFree = Template::where('price', 0)->where('id', $id)->first();
        $cekPembayaran = UserDataPembayaran::where('users_id', $userId)->where('template_id', $id)->where('status', 'Selesai')->first();

        if ($cekTemplateFree){
            return view('template.buat_' . $id, compact('data','dataTemplate','id'));
        } else if (!$cekTemplateFree && $cekPembayaran) {
            return view('template.buat_' . $id, compact('data','dataTemplate','id'));
        }

        return redirect()->back()->with('success', 'Tidak ditemukan');
    }
}
