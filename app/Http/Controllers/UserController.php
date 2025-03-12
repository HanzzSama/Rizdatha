<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        try {
            Log::info("Data yang diterima:", $request->all()); // Log data masuk

            $user = Auth::user();

            // Validasi input
            $request->validate([
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                'no_telp' => 'nullable|string|max:15',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'jns_klmn' => 'nullable|string|max:10',
                'alamat' => 'nullable|string|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Update data user
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->no_telp = $request->no_telp;
            $user->email = $request->email;
            $user->jns_klmn = $request->jns_klmn;
            $user->alamat = $request->alamat;

            // Jika ada upload foto profil
            if ($request->hasFile('profile')) {
                // Hapus gambar lama jika ada
                if ($user->profile) {
                    Storage::disk('public')->delete($user->profile);
                }

                // Simpan gambar ke storage
                $profilePath = $request->file('profile')->store('uploads/profile', 'public');
                $user->profile = $profilePath;
            }

            $user->save();

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui', 'profile' => asset('storage/' . $user->profile)]);
        } catch (\Exception $e) {
            Log::error("Error saat update user: " . $e->getMessage()); // Log error
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}