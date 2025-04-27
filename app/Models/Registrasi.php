<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasis'; // nama tabel

    protected $fillable = [
        'tanggal_registrasi',
        'id_pasien',
        'id_dokter',
        'id_pegawai',
        'id_asuransi',
        'nomor_asuransi',
        'id_ruangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }
    // Relasi ke User (Pasien)
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai');
    }

    // Relasi ke Asuransi
    public function asuransi()
    {
        return $this->belongsTo(Asuransi::class, 'id_asuransi');
    }

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(RuangPelayanan::class, 'id_ruangan');
    }
}
