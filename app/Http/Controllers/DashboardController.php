<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        // Total seluruh siswa
        $totalSiswa = Siswa::count();

        // Total uang yang terkumpul dari pembayaran lunas
        $kasTerkumpul = Pembayaran::where('status', 'lunas')
            ->sum('jumlah_bayar');

        // Jumlah siswa yang sudah lunas
        $sudahLunas = Pembayaran::where('status', 'lunas')
            ->distinct('id_siswa')
            ->count('id_siswa');

        // Jumlah siswa yang belum lunas
        $belumLunas = $totalSiswa - $sudahLunas;

        // 5 pembayaran terbaru
        $pembayaranTerbaru = Pembayaran::with('siswa')
            ->orderBy('tanggal_bayar', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalSiswa',
            'kasTerkumpul',
            'sudahLunas',
            'belumLunas',
            'pembayaranTerbaru'
        ));
    }
}