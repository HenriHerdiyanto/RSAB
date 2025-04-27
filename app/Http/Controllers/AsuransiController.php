<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    public function index()
    {
        $asuransis = Asuransi::all();
        return view('asuransis.index', compact('asuransis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_asuransi' => 'required|string|max:255',
        ]);

        Asuransi::create($request->all());

        return redirect()->route('asuransis.index')->with('success', 'Asuransi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $asuransis = Asuransi::findOrFail($id);
        return view('asuransis.edit', compact('asuransis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_asuransi' => 'required|string|max:255',
        ]);
        Asuransi::findOrFail($id)->update($request->all());
        return redirect()->route('asuransis.index')->with('success', 'Asuransi berhasil diupdate.');
    }

    public function destroy($id)
    {
        Asuransi::findOrFail($id)->delete();
        return redirect()->route('asuransis.index')->with('success', 'Asuransi berhasil dihapus.');
    }
}
