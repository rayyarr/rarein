<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserdataUndangan;
use App\Models\UserdataPasangan;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $userdata = UserdataUndangan::where('user_id', $user_id)->first();
        $dataPasangan = UserdataPasangan::where('pasangan_id', $user_id)->first();

        return view('home', compact('userdata', 'dataPasangan'));
    }

    public function pasangan()
    {
        $userPasangan = auth()->user();
        $userDataPasangan = \App\Models\UserDataPasangan::where('pasangan_id', $userPasangan->id)->first();
        
        return view('user.setup_pasangan', compact('userPasangan', 'userDataPasangan'));
    }

    public function profil()
    {
        return view('profile');
    }

    public function tambah()
    {
        $template = Template::latest()->paginate(5);
        
        return view('buat',compact('template'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
