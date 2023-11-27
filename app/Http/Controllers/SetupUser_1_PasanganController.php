<?php

namespace App\Http\Controllers;

use App\Models\UserdataPasangan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SetupUser_1_PasanganController extends Controller
{
    public function index()
    {
        $userPasangan = auth()->user();
        $dataPasangan = UserDataPasangan::where('pasangan_id', $userPasangan->id)->first();

        return view('user.setup_pasangan', compact('userPasangan', 'dataPasangan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_pria' => 'required|string|max:255',
            'nama_wanita' => 'required|string|max:255',
            'bio_pria' => 'required|string|max:255',
            'bio_wanita' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $pasangan = UserDataPasangan::where('pasangan_id', $userId)->first();

        if ($pasangan) {
            // Jika data sudah ada, lakukan update
            $pasangan->update([
                'nama_pria' => $request->input('nama_pria'),
                'nama_wanita' => $request->input('nama_wanita'),
                'bio_pria' => $request->input('bio_pria'),
                'bio_wanita' => $request->input('bio_wanita'),
            ]);
        } else {
            // Jika data belum ada, lakukan create
            UserDataPasangan::create([
                'nama_pria' => $request->input('nama_pria'),
                'nama_wanita' => $request->input('nama_wanita'),
                'bio_pria' => $request->input('bio_pria'),
                'bio_wanita' => $request->input('bio_wanita'),
                'pasangan_id' => $userId,
            ]);
        }

        return redirect()->route('beranda')->with('success', 'Template created successfully.');
    }
}
