<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = User::where('status_user', '=', 'dokter')->get();
        return view('dokter.index', compact('dokter'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user', // tambah validasi role
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'status_user' => 'required|string',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'status_user' => $validated['status_user'],
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Password hanya valid jika diubah
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;

        // Cek apakah password baru diisi
        if ($request->filled('password')) {
            // Encrypt password baru jika diisi
            $user->password = Hash::make($request->password);
        }
        // Jika password tidak diubah, biarkan password lama tetap

        // Simpan perubahan dan cek apakah berhasil
        if ($user->save()) {
            // Jika berhasil disimpan
            session()->flash('success', 'Data berhasil diperbarui!');
            return redirect()->route('dokter.index');
        } else {
            // Jika gagal disimpan
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
            return redirect()->route('dokter.edit', $user->id);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            // Jika berhasil dihapus
            session()->flash('success', 'Data berhasil dihapus!');
        } else {
            // Jika gagal dihapus
            session()->flash('error', 'Terjadi kesalahan saat menghapus data.');
        }
        return redirect()->route('dokter.index');
    }
}
