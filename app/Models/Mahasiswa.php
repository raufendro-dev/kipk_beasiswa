<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
protected $fillable = [
    'user_id', 'nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir',
    'akte_kelahiran', 'kartu_keluarga', 'kks', 'foto_rumah', 'ijazah', 'raport',
    'pas_foto', 'shun', 'prestasi', 'kartu_bansos', 'sktm', 'penghasilan', 'bukti_ptn',
];

}
