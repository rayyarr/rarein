<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the current user
        $user = auth()->user();

        // Return the view
        return view('profile', compact('user'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Get the image
        $image = $request->file('image');

        // Store the image
        $filename = $user->id . '.' . $image->extension();
        $image->move(public_path('images'), $filename);

        // Delete the old image
        $oldImage = $user->image;

        if ($oldImage && $oldImage !== $filename) {
            $filePath = public_path('images/' . $oldImage);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Update the user's profile image
        $user->image = $filename;
        $user->save();

        // Redirect to the profile page
        return redirect()->route('profil');
    }
}
