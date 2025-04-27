<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;

class UserController extends Controller
{
    public function accessMenu(User $user)
    {
        $menus = Menu::all();
        $userMenuIds = $user->menus()->pluck('menus.id')->toArray(); // ambil menu yang sudah dimiliki user
        return view('admin.access', compact('user', 'menus', 'userMenuIds'));
    }

    public function updateAccessMenu(Request $request, User $user)
    {
        $user->menus()->sync($request->menu_ids); // Update relasi menu

        return redirect()->route('pasien.index')->with('success', 'Akses menu berhasil diperbarui.');
    }

    public function accessMenuDokter(User $user)
    {
        $menus = Menu::all();
        $userMenuIds = $user->menus()->pluck('menus.id')->toArray(); // ambil menu yang sudah dimiliki user
        return view('dokter.access', compact('user', 'menus', 'userMenuIds'));
    }
    public function updateAccessMenuDokter(Request $request, User $user)
    {
        $user->menus()->sync($request->menu_ids); // Update relasi menu

        return redirect()->route('dokter.index')->with('success', 'Akses menu berhasil diperbarui.');
    }

    public function accessMenuPegawai(User $user)
    {
        $menus = Menu::all();
        $userMenuIds = $user->menus()->pluck('menus.id')->toArray(); // ambil menu yang sudah dimiliki user
        return view('pegawai.access', compact('user', 'menus', 'userMenuIds'));
    }
    public function updateAccessMenuPegawai(Request $request, User $user)
    {
        $user->menus()->sync($request->menu_ids); // Update relasi menu

        return redirect()->route('pegawai.index')->with('success', 'Akses menu berhasil diperbarui.');
    }
}
