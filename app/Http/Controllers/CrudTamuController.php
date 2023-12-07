<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Tamu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CrudTamuController extends Controller
{

	/*public function index()
	{
		$user = Users::all();
		return view('crud_users.index', ['user' => $user]);
	}
	*/
	public function index(Request $request)
	{
		$search = $request->input('search');
		$user = Tamu::when($search, function ($query, $search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('address', 'like', '%' . $search . '%');
		})->get();

		return view('user.crud_tamu.index', ['user' => $user]);
	}

	public function tambah()
	{
		return view('user.crud_tamu.tambah');
	}

	public function store(Request $request): RedirectResponse
	{
		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);

		$userId = Auth::id();

		// Simpan ke database
		$user = Tamu::create([
			'tamu_id' => $userId,
			'name' => $request->name,
			'address' => $request->address,
		]);

		return redirect('/tamu')->with('success', 'Anda berhasil menambahkan data!');
	}

	public function edit($id)
	{
		$user = Tamu::find($id);
		return view('user.crud_tamu.edit', ['user' => $user]);
	}

	public function update($id, Request $request): RedirectResponse
	{
		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);

		$user = Tamu::find($id);

		// Update name and email
		$user->name = $request->name;
		$user->address = $request->address;

		// Save changes to the database
		$user->save();

		// Redirect to the desired location (e.g., home page)
		return redirect('/tamu')->with('success', 'Anda berhasil memperbarui data!');
	}

	public function delete($id)
	{
		$user = Tamu::find($id);

		$user->delete();
		return redirect('/tamu')->with('success', 'Anda berhasil menghapus data!');
	}
}
