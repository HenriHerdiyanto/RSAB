<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_registrasi',
        'id_tindakan',
        'id_pegawai',
    ];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'id_registrasi');
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'id_tindakan');
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai');
    }
    // ===========
    // Relasi ke model Registrasi
    // app/Models/Transaksi.php
    // public function registrasi()
    // {
    //     return $this->belongsTo(Registrasi::class, 'id_registrasi');
    // }

    // // Relasi ke model Tindakan
    // public function tindakan()
    // {
    //     return $this->belongsTo(Tindakan::class);
    // }

    // // Relasi ke model User untuk Pegawai
    // public function pegawai()
    // {
    //     return $this->belongsTo(User::class, 'id_pegawai');
    // }
}
