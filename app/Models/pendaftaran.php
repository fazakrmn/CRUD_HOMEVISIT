<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model ini.
     * Secara default Laravel akan menganggap namanya 'pendaftarans'.
     */
    protected $table = 'pendaftarans';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Semua field dari halaman Input Data, Jadwal, dan Permasalahan dimasukkan ke sini.
     */
    protected $fillable = [
        // Identitas Pasien (Halaman 1)
        'nama',
        'telepon',
        'alamat',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',

        // Jadwal Periksa (Halaman 2)
        'tanggal_periksa',
        'waktu_periksa',

        // Keluhan/Permasalahan (Halaman 3)
        'permasalahan',
    ];

    /**
     * Casting atribut.
     * Mengubah string dari database menjadi objek Carbon (Tanggal) secara otomatis.
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_periksa' => 'date',
    ];
}