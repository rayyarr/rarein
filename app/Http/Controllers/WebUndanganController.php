<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\UserDataAcara;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class WebUndanganController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $data = UserDataAcara::where('users_id', $userId)->first();
    
        return view('template.template2', compact('data'));
    }

    public function create()
    {
        $userId = Auth::id();
        $data = UserDataAcara::where('users_id', $userId)->first();
    
        return view('template.buat_template2', compact('data'));
    }
}
