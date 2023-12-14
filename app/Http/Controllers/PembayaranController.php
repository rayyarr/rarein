<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pembayaran = Pembayaran::latest()->paginate(5);

        return view('user.pembayaran.index', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'tanggal_pemesanan' => 'required|datetime',
            'jumlah_tagihan' => 'required|unsignedBigInteger',
            'metode_pembayaran' => 'required|string|max:255',
            'gambar' => 'required|varchar'
        ]);

        // Simpan data template tanpa menyertakan file gambar
        $pembayaran = Pembayaran::create([
            'nama_pemesan' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'tanggal_pemesanan' => 'required|datetime',
            'jumlah_tagihan' => 'required|unsignedBigInteger',
            'metode_pembayaran' => 'required|string|max:255',
            'gambar' => 'required|varchar'
        ]);

        // Dapatkan ID template yang baru saja dibuat
        $pembayaranId = $pembayaran->id;

        // Ubah nama file gambar sesuai dengan ID template
        $pembayaran = $pembayaranId . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('image')->move(public_path('gambar'), $gambar);

        // Update nama file gambar dalam data template
        $pembayaran->update(['gambar' => $gambar]);

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil menambahkan gambar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('gambar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('gambar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran): RedirectResponse
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'tanggal_pemesanan' => 'required|datetime',
            'jumlah_tagihan' => 'required|unsignedBigInteger',
            'metode_pembayaran' => 'required|string|max:255',
            'gambar' => 'required|varchar'
            
            
            
        ]);

        // Dapatkan ID template
        $pembayaranId = $pembayaran->id;

        // Simpan nama file gambar sebelumnya
        $previousImage = $pembayaran->gambar;

        // Update data template tanpa memperbarui gambar jika tidak ada perubahan
        $template->update([
            'nama_pemesan' => $request->input('nama_pemesan'),
            'template' => $request->input('template'),
            'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
            'jumlah_tagihan' => $request->input('jumlah_tagihan'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'gambar' => $request->input('gambar')
        ]);

        // Periksa apakah ada file gambar baru diupload
        if ($request->hasFile('gambar')) {
            // Hapus file gambar sebelumnya jika ada
            if ($previousImage) {
                $imagePath = public_path('gambar' . $previousImage);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Pindahkan file gambar baru dan update nama file
            $imageName = $pembayaranId . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path('gambar'), $imageName);
            $pembayaran->update(['gambar' => $imageName]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil memperbarui gambar.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        // Hapus file gambar sebelumnya jika ada
        $previousImage = $pembayaran->gambar;
        if ($previousImage) {
            $imagePath = public_path('gambar' . $previousImage);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil menghapus gambar.');
    }
}
