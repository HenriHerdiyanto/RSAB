<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\User;
use App\Models\Asuransi;
use App\Models\RuangPelayanan;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        $ruangan = RuangPelayanan::all();
        $asuransi = Asuransi::all();
        $user = User::where("status_user", "=", "user")->get();
        $dokter = User::where("status_user", "=", "dokter")->get();
        $pegawai = User::where("status_user", "=", "pegawai")->get();
        $registrasis = Registrasi::all();
        return view('registrasi.index', compact('registrasis', 'user', 'asuransi', 'ruangan', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_pegawai' => 'required',
            'id_asuransi' => 'required',
            'nomor_asuransi' => 'nullable|string',
            'id_ruangan' => 'required',
        ]);

        Registrasi::create($request->all());

        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil dibuat.');
    }

    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $user = User::where("status_user", "=", "user")->get();
        $dokter = User::where("status_user", "=", "dokter")->get();
        $pegawai = User::where("status_user", "=", "pegawai")->get();
        $asuransis = Asuransi::all();
        $ruangans = RuangPelayanan::all();

        return view('registrasi.edit', compact('registrasi', 'user', 'asuransis', 'ruangans', 'dokter', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_pegawai' => 'required',
            'id_asuransi' => 'required',
            'nomor_asuransi' => 'nullable|string',
            'id_ruangan' => 'required',
        ]);

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update($request->all());

        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'Registrasi berhasil dihapus.');
    }
}
