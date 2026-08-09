<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'title'           => 'nullable|string|max:255',
            'bio'             => 'nullable|string',
            'photo'           => 'nullable|image|max:2048',
            'photo_secondary' => 'nullable|image|max:2048',
        ]);

        // Ambil data profil pertama, atau buat instance baru jika belum ada di database
        $profile = Profile::first() ?? new Profile();
        
        $data = $request->only('name', 'title', 'bio');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        if ($request->hasFile('photo_secondary')) {
            $data['photo_secondary'] = $request->file('photo_secondary')->store('profile', 'public');
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile berhasil diupdate!');
    }
}