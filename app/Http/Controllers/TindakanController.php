<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        $tindakans = Tindakan::all();
        return view('tindakan.index', compact('tindakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'tarif_tindakan' => 'required|numeric',
        ]);

        Tindakan::create($request->all());

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tindakan = Tindakan::find($id);
        return view('tindakan.edit', compact('tindakan'));
    }

    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'tarif_tindakan' => 'required|numeric',
        ]);

        $tindakan->update($request->all());

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil diupdate.');
    }

    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();

        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil dihapus.');
    }
}
