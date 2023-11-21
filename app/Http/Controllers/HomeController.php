<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserdataUndangan;
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
        
        return view('home', compact('userdata'));
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
