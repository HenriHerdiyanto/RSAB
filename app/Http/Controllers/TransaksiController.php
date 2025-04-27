<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Registrasi;
use App\Models\Tindakan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // public function index()
    // {
    //     // Mengambil semua tindakan
    //     $tindakans = Tindakan::all();

    //     // Mengambil semua registrasi dan memuat relasi 'user' untuk mendapatkan nama pasien
    //     $registrasi = Registrasi::with('user')->get();

    //     // Mengambil semua transaksi dan memuat relasi 'registrasi', 'tindakan', dan 'pegawai'
    //     $transaksis = Transaksi::with(['registrasi.user', 'tindakan', 'pegawai'])->get();

    //     return view('transaksi.index', compact('transaksis', 'registrasi', 'tindakans'));
    // }

    public function index()
    {
        // Mengambil semua transaksi dan memuat relasi 'registrasi' dan 'user' secara eager load
        // $transaksis = Transaksi::with(['registrasi.user', 'tindakan', 'pegawai'])->get();
        $transaksis = Transaksi::all();

        // Mengambil data registrasi untuk dropdown
        $registrasi = Registrasi::with('user')->get();

        // Mengambil semua tindakan untuk dropdown
        $tindakans = Tindakan::all();  // Menambahkan pengambilan data Tindakan

        // Mengirimkan variabel ke view
        return view('transaksi.index', compact('transaksis', 'registrasi', 'tindakans'));
    }


    // public function create()
    // {
    //     $registrasis = Registrasi::all();
    //     $tindakans = Tindakan::all();
    //     $pegawais = Pegawai::all();
    //     return view('transaksi.create', compact('registrasis', 'tindakans', 'pegawais'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'id_registrasi' => 'required',
            'id_tindakan' => 'required',
            'id_pegawai' => 'required',
        ]);

        // Mendapatkan id_pasien dari id_registrasi
        $registrasi = Registrasi::findOrFail($request->id_registrasi);
        $id_pasien = $registrasi->id_pasien; // Mendapatkan pasien dari registrasi

        // Menyimpan transaksi
        Transaksi::create([
            'id_registrasi' => $request->id_registrasi,
            'id_tindakan' => $request->id_tindakan,
            'id_pegawai' => $request->id_pegawai,
            'id_pasien' => $id_pasien, // Pastikan pasien yang tepat dimasukkan
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $registrasis = Registrasi::all();
        $tindakans = Tindakan::all();
        $pegawais = Pegawai::all();
        $transaksis = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksis', 'registrasis', 'tindakans', 'pegawais'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_registrasi' => 'required',
            'id_tindakan' => 'required',
            'id_pegawai' => 'required',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
