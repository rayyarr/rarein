<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserdataUndangan;
use App\Models\UserdataAcara;
use App\Models\Template;
use App\Models\UserdataTamu;
use App\Models\UserdataTemplate;
use App\Models\UserdataPembayaran;
use App\Models\ChartTamu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $userdata = UserdataUndangan::where('users_id', $user_id)->first();

        $dataAcara = UserdataAcara::where('users_id', $user_id)->first();
        if ($this->hasEmptyColumns($dataAcara)) {
            return redirect('/setup');
        }

        $comments = DB::table('userdata_acara')
                    ->join('users', 'userdata_acara.users_id', '=', 'users.id')
                    ->where('userdata_acara.users_id', $user_id)
                    ->select('userdata_acara.id', 'users.name as nama_pasangan')
                    ->first();

        $countByKehadiran = ChartTamu::countByKehadiran();

        $totalUndangan = UserdataTemplate::where('users_id', $user_id)->count();
        $totalTamu = UserdataTamu::where('users_id', $user_id)->count();
        $totalTagihan = UserdataPembayaran::where('users_id', $user_id)->count();

        $dataAcara = UserDataAcara::where('users_id', $user_id)->first();
        $dataTemplate = DB::table('userdata_template')
        ->join('userdata_acara', 'userdata_template.users_id', '=', 'userdata_acara.users_id')
        ->where('userdata_template.users_id', $user_id)
        ->select('userdata_acara.*', 'userdata_template.*')
        ->get();

        return view('home', compact('userdata', 'dataAcara', 'dataTemplate', 'comments', 'countByKehadiran', 'totalUndangan', 'totalTamu', 'totalTagihan', 'dataAcara'));
    }

    private function hasEmptyColumns($model)
{
    // Check if any column in the model is empty
    foreach ($model->getAttributes() as $attribute) {
        if (empty($attribute)) {
            return true;
        }
    }

    return false;
    }

    public function pasangan()
    {
        $userAcara = auth()->user();
        $userdataAcara = \App\Models\UserdataAcara::where('users_id', $userAcara->id)->first();
        
        return view('user.setup_pasangan', compact('userAcara', 'userdataAcara'));
    }

    public function profil()
    {
        return view('profile');
    }

    public function tambah()
    {
        $userId = Auth::id();
        $templates = Template::orderBy('id', 'asc')->paginate(5);

        $pembayaran = UserDataPembayaran::where('users_id', $userId)->first();
        
        return view('user.buat',compact('pembayaran', 'templates', 'userId'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}
