<?php

namespace App\Http\Controllers;

use App\Models\UserDataAcara;
use App\Models\UserdataTemplate;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SetupUserUtama extends Controller
{
    public function index()
    {
        $userAcara = auth()->user();
        $dataAcara = UserDataAcara::where('users_id', $userAcara->id)->first();

        // Periksa apakah kolom 'nama_acara' atau 'tanggal_akad' kosong
        if (empty($dataAcara->nama_acara)/* || empty($dataAcara->tanggal_akad)*/) {
            // Jika salah satu kolom kosong, arahkan ke tampilan 'user.setup_mulai'
            return view('user.setup_mulai', compact('userAcara', 'dataAcara'));
        } else if (empty($dataAcara->nama_pria) || empty($dataAcara->nama_wanita) || empty($dataAcara->bio_pria) || empty($dataAcara->bio_wanita)) {
            // Jika kedua kolom sudah terisi, tetapi kolom lain masih kosong
            // arahkan ke tampilan 'user.setup_pasangan'
            return view('user.setup_pasangan', compact('userAcara', 'dataAcara'));
        } else if (empty($dataAcara->tempat_akad) || empty($dataAcara->tempat_resepsi) || empty($dataAcara->tanggal_akad) || empty($dataAcara->tanggal_resepsi)) {
            return view('user.setup_acara', compact('userAcara', 'dataAcara'));
        } else {
            return redirect()->route('beranda');
        }
    }

    public function store(Request $request): RedirectResponse
    {
        $userAcara = auth()->user();
        $dataAcara = UserdataAcara::where('users_id', $userAcara->id)->first();

        // Periksa apakah kolom 'nama_acara' atau 'tanggal_akad' kosong
        if (empty($dataAcara->nama_acara)/* || empty($dataAcara->tanggal_akad) || empty($dataAcara->tanggal_resepsi)*/) {
            $request->validate([
                'nama_acara' => 'required|string|max:255',
                //'tanggal_akad' => 'required|date|after_or_equal:today',
            ]);

            $userId = Auth::id();

            $pasangan = UserdataAcara::where('users_id', $userId)->first();

            if ($pasangan) {
                // Jika data sudah ada, lakukan update
                $pasangan->update([
                    'nama_acara' => $request->input('nama_acara'),
                    //'tanggal_akad' => $request->input('tanggal_akad'),
                    //'tanggal_resepsi' => $request->input('tanggal_akad'),
                ]);
            } else {
                // Jika data belum ada, lakukan create
                UserdataAcara::create([
                    'nama_acara' => $request->input('nama_acara'),
                    //'tanggal_akad' => $request->input('tanggal_akad'),
                    //'tanggal_resepsi' => $request->input('tanggal_akad'),
                    'users_id' => $userId,
                ]);
            }
        } else if (empty($dataAcara->nama_pria) || empty($dataAcara->nama_wanita) || empty($dataAcara->bio_pria) || empty($dataAcara->bio_wanita)) {
            $request->validate([
                'nama_pria' => 'required|string|max:255',
                'nama_wanita' => 'required|string|max:255',
                'bio_pria' => 'required|string|max:255',
                'bio_wanita' => 'required|string|max:255',
            ]);

            $userId = Auth::id();

            $pasangan = UserdataAcara::where('users_id', $userId)->first();

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
                UserdataAcara::create([
                    'nama_pria' => $request->input('nama_pria'),
                    'nama_wanita' => $request->input('nama_wanita'),
                    'bio_pria' => $request->input('bio_pria'),
                    'bio_wanita' => $request->input('bio_wanita'),
                    'users_id' => $userId,
                ]);
            }
        } else if (empty($dataAcara->tempat_akad) || empty($dataAcara->tempat_resepsi) || empty($dataAcara->tanggal_akad) || empty($dataAcara->tanggal_resepsi)) {
            $request->validate([
                'tempat_akad' => 'required|string|max:255',
                'tempat_resepsi' => 'required|string|max:255',
                'tanggal_akad' => 'required|date|after_or_equal:today',
                'tanggal_resepsi' => 'required|date|after_or_equal:tanggal_akad',
            ]);

            $userId = Auth::id();

            $pasangan = UserdataAcara::where('users_id', $userId)->first();

            if ($pasangan) {
                // Jika data sudah ada, lakukan update
                $pasangan->update([
                    'tempat_akad' => $request->input('tempat_akad'),
                    'tempat_resepsi' => $request->input('tempat_resepsi'),
                    'tanggal_akad' => $request->input('tanggal_akad'),
                    'tanggal_resepsi' => $request->input('tanggal_resepsi'),
                ]);
            } else {
                // Jika data belum ada, lakukan create
                UserdataAcara::create([
                    'tempat_akad' => $request->input('tempat_akad'),
                    'tempat_resepsi' => $request->input('tempat_resepsi'),
                    'tanggal_akad' => $request->input('tanggal_akad'),
                    'tanggal_resepsi' => $request->input('tanggal_resepsi'),
                ]);
            }
        }

        return redirect()->route('beranda')->with('success', 'Sukses mengisi form.');
    }

    public function pasangan_store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_pria' => 'required|string|max:255',
            'nama_wanita' => 'required|string|max:255',
            'bio_pria' => 'required|string|max:255',
            'bio_wanita' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $pasangan = UserdataAcara::where('users_id', $userId)->first();

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
            UserdataAcara::create([
                'nama_pria' => $request->input('nama_pria'),
                'nama_wanita' => $request->input('nama_wanita'),
                'bio_pria' => $request->input('bio_pria'),
                'bio_wanita' => $request->input('bio_wanita'),
                'users_id' => $userId,
            ]);
        }

        return redirect()->route('beranda')->with('success', 'Sukses mengisi form.');
    }

    public function publish($id, Request $request): RedirectResponse
    {
        $userId = Auth::id();

        $request->validate([
            'nama_pria' => 'required|string|max:255',
            'nama_wanita' => 'required|string|max:255',
            'bio_pria' => 'required|string|max:255',
            'bio_wanita' => 'required|string|max:255',
            'nama_acara' => 'required|string|max:255',
            'tanggal_akad' => 'required|date_format:Y-m-d H:i',
            'tanggal_resepsi' => 'required|date_format:Y-m-d H:i|after_or_equal:tanggal_akad',
            'tempat_akad' => 'required|string|max:255',
            'tempat_resepsi' => 'required|string|max:255',
            //'foto_pria' => 'required|image|mimes:jpeg,png,jpg',
            //'foto_wanita' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'nama_pria.required' => 'Kolom Nama Pria wajib diisi.',
            'nama_wanita.required' => 'Kolom Nama Wanita wajib diisi.',
            'bio_pria.required' => 'Kolom Biodata Pria wajib diisi.',
            'bio_wanita.required' => 'Kolom Biodata Wanita wajib diisi.',
            'nama_acara.required' => 'Kolom Nama Acara wajib diisi.',
            'tanggal_akad.required' => 'Kolom Tanggal Akad wajib diisi.',
            'tanggal_akad.date_format' => 'Format Tanggal Akad tidak valid.',
            'tanggal_resepsi.required' => 'Kolom Tanggal Resepsi wajib diisi.',
            'tanggal_resepsi.date_format' => 'Format Tanggal Resepsi tidak valid.',
            'tanggal_resepsi.after_or_equal' => 'Tanggal Resepsi harus setelah atau sama dengan Tanggal Akad.',
            'tempat_akad.required' => 'Kolom Tempat Akad wajib diisi.',
            'tempat_resepsi.required' => 'Kolom Tempat Resepsi wajib diisi.',
        ]);        

        $userId = Auth::id();
        $uniqueLink = $userId . Str::random(4);
        while (DB::table('userdata_template')->where('link', $uniqueLink)->exists()) {
            $uniqueLink = Str::random(4);
        }
        
        $userdata_template = UserdataTemplate::where('users_id', $userId)->where('templates_id', $id)->first();
        if ($request->hasFile('foto_pria')) {
            $foto_pria = $request->file('foto_pria');
            // Store the image
            $filename_foto_pria = $userId . '_foto_pria.' . $foto_pria->extension();
            $filename_foto_priaDB = 'images/' . $filename_foto_pria;
            $foto_pria->move(public_path('images'), $filename_foto_pria);

            // Delete the old image
            $oldImage = $userdata_template->foto_pria;

            if ($oldImage && $oldImage !== $filename_foto_pria && $oldImage !== 'default_pria.webp') {
                $filePath = public_path('images/' . $oldImage);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $userdata_template->update(['foto_pria' => $filename_foto_priaDB]);
        }

        if ($request->hasFile('foto_wanita')) {
            $foto_wanita = $request->file('foto_wanita');
            // Store the image
            $filename_foto_wanita = $userId . '_foto_wanita.' . $foto_wanita->extension();
            $filename_foto_wanitaDB = 'images/' . $filename_foto_wanita;
            $foto_wanita->move(public_path('images'), $filename_foto_wanita);

            // Delete the old image
            $oldImage = $userdata_template->foto_wanita;

            if ($oldImage && $oldImage !== $filename_foto_wanita && $oldImage !== 'default_wanita.webp') {
                $filePath = public_path('images/' . $oldImage);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $userdata_template->update(['foto_wanita' => $filename_foto_wanitaDB]);
        }

        $pasangan = UserdataAcara::where('users_id', $userId)->first();

        $pasangan->update([
            'nama_pria' => $request->input('nama_pria'),
            'nama_wanita' => $request->input('nama_wanita'),
            'bio_pria' => $request->input('bio_pria'),
            'bio_wanita' => $request->input('bio_wanita'),
            'tanggal_akad' => $request->input('tanggal_akad'),
            'tanggal_resepsi' => $request->input('tanggal_resepsi'),
            'tempat_akad' => $request->input('tempat_akad'),
            'tempat_resepsi' => $request->input('tempat_resepsi'),
        ]);

        $userdata_template->update([
            'status' => 1,
            'link' => empty($userdata_template->link) ? $uniqueLink : $userdata_template->link,
            //'foto_pria' => $filename_foto_priaDB,
            //'foto_wanita' => $filename_foto_wanitaDB,
        ]);

        return redirect()->route('beranda')->with('success', 'Sukses mengisi form.');
    }
}
