<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\UserdataTamu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
		$user = UserdataTamu::when($search, function ($query, $search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('address', 'like', '%' . $search . '%');
		})->get();

		/*$comments = DB::table('userdata_tamu')
                    ->join('users', 'userdata_tamu.users_id', '=', 'users.id')
                    ->where('userdata_tamu.users_id', '=', Auth::user()->id)
                    ->select('userdata_tamu.id', 'users.name as nama_pasangan')
                    ->first();
		*/
		return view('user.crud_tamu.index', compact('user'));
	}

	public function tambah()
	{
		return view('user.crud_tamu.tambah');
	}

	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => 'required',
			'address' => 'required',
		]);

		$userId = Auth::id();

		// Simpan ke database
		$user = UserdataTamu::create([
			'users_id' => $userId,
			'name' => $request->name,
			'address' => $request->address,
		]);

		return redirect('/tamu')->with('success', 'Anda berhasil menambahkan data!');
	}

	public function edit($id)
	{
		$user = UserdataTamu::find($id);
		return view('user.crud_tamu.edit', ['user' => $user]);
	}

	public function update($id, Request $request): RedirectResponse
	{
		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);

		/*UserdataTamu::create([
			'users_id' => Auth::id(),
			'name' => $request->name,
			'address' => $request->address,
		]);*/

		$user = UserdataTamu::find($id);

		$user->name = $request->name;
		$user->address = $request->address;
		$user->save();

		// Redirect to the desired location (e.g., home page)
		return redirect('/tamu')->with('success', 'Anda berhasil memperbarui data!');
	}

	public function delete($id)
	{
		$user = UserdataTamu::find($id);

		$user->delete();
		return redirect('/tamu')->with('success', 'Anda berhasil menghapus data!');
	}
}
