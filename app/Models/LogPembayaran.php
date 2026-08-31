<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogPembayaran extends Model
{
    protected $table = 'log_pembayaran';

    protected $primaryKey = 'id_log';

    public $timestamps = false;

    protected $fillable = [
        'id_pembayaran',
        'aksi',
        'waktu',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(
            Pembayaran::class,
            'id_pembayaran',
            'id_pembayaran'
        );
    }
}