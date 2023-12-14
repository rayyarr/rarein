<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserdataUndangan;
use App\Models\UserdataAcara;
use App\Models\Template;
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

        return view('home', compact('userdata', 'dataAcara', 'comments'));
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
        $template = Template::orderBy('id', 'asc')->paginate(5);
        
        return view('user.buat',compact('template', 'userId'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
