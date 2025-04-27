<?php

namespace App\Http\Controllers;

use App\Models\RuangPelayanan;
use Illuminate\Http\Request;

class RuangPelayananController extends Controller
{
    public function index()
    {
        $ruangans = RuangPelayanan::all();
        return view('ruangpelayanans.index', compact('ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        RuangPelayanan::create($request->all());

        return redirect()->route('ruangpelayanans.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ruangans = RuangPelayanan::find($id);
        return view('ruangpelayanans.edit', compact('ruangans'));
    }

    public function update(Request $request, RuangPelayanan $ruangpelayanan)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        $ruangpelayanan->update($request->all());

        return redirect()->route('ruangpelayanans.index')->with('success', 'Ruangan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $ruangans = RuangPelayanan::find($id);
        $ruangans->delete();
        return redirect()->route('ruangpelayanans.index')->with('success', 'Ruangan berhasil dihapus.');
    }
}
