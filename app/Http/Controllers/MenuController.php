<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\UserMenu;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // public function create()
    // {
    //     return view('menus.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'route_name' => 'required|string|max:255', // <- HARUS required
        ]);
        Menu::create($request->only(['name', 'route_name']));
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dibuat.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'route_name' => 'required|string|max:255', // <- HARUS required
        ]);
        Menu::findOrFail($id)->update($request->only(['name', 'route_name']));
        return redirect()->route('menus.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }


    public function giveAccess(Request $request, $userId)
    {
        $request->validate([
            'menu_ids' => 'required|array',
        ]);

        $user = User::findOrFail($userId);

        // Hapus akses lama
        UserMenu::where('user_id', $userId)->delete();

        // Tambahkan akses baru
        foreach ($request->menu_ids as $menuId) {
            UserMenu::create([
                'user_id' => $userId,
                'menu_id' => $menuId,
            ]);
        }

        return redirect()->back()->with('success', 'Akses menu berhasil diperbarui.');
    }

    // public function showGiveAccessForm($userId)
    // {
    //     $user = User::findOrFail($userId);
    //     $menus = Menu::all();
    //     $userMenuIds = UserMenu::where('user_id', $userId)->pluck('menu_id')->toArray();

    //     return view('menus.give_access', compact('user', 'menus', 'userMenuIds'));
    // }
}
