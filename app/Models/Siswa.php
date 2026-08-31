<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    public $timestamps = false;

    protected $fillable = [
        'nis',
        'nama',
        'jabatan',
        'kelas',
    ];

    public function pembayaran()
    {
        return $this->hasMany(
            Pembayaran::class,
            'id_siswa',
            'id_siswa'
        );
    }
}