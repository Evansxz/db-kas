<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {

    $totalSiswa = Siswa::count();

    $kasTerkumpul = Pembayaran::where('status', 'lunas')
        ->sum('jumlah_bayar');

    $sudahLunas = Pembayaran::where('status', 'lunas')
        ->distinct('id_siswa')
        ->count('id_siswa');

    $belumLunas = $totalSiswa - $sudahLunas;


    // =========================
    // PEMBAYARAN TERBARU
    // =========================

    $pembayaranTerbaru = Pembayaran::with('siswa')
        ->orderByDesc('tanggal_bayar')
        ->take(5)
        ->get();


        // =========================
        // FILTER BULAN / TAHUN
        // =========================

        $bulan = request('bulan', now()->month);
        $tahun = request('tahun', now()->year);

        $daftarBulan = [];

        $mulai = \Carbon\Carbon::create(2026, 1, 1);
        $sekarang = now()->startOfMonth();

        while ($sekarang->greaterThanOrEqualTo($mulai)) {

            $daftarBulan[] = [
                'bulan' => $sekarang->month,
                'tahun' => $sekarang->year,
                'label' => $sekarang->translatedFormat('M y'),
            ];

            $sekarang->subMonth();
        }

        // Status pembayaran berdasarkan bulan dan tahun yang dipilih
        $statusLunas = Pembayaran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->where('status', 'lunas')
            ->distinct('id_siswa')
            ->count('id_siswa');

        $statusBelumLunas = Pembayaran::whereMonth('tanggal_bayar', $bulan)
            ->whereYear('tanggal_bayar', $tahun)
            ->where('status', 'belum lunas')
            ->distinct('id_siswa')
            ->count('id_siswa');

        // Daftar tahun yang tersedia di database
        $tahunList = Pembayaran::selectRaw('YEAR(tanggal_bayar) as tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        $daftarBulan = [];

        $mulai = \Carbon\Carbon::create(2026, 1, 1);
        $sekarang = now()->startOfMonth();

        while ($sekarang->greaterThanOrEqualTo($mulai)) {

            $daftarBulan[] = [
                'bulan' => $sekarang->month,
                'tahun' => $sekarang->year,
                'label' => $sekarang->translatedFormat('M y'),
            ];
            $sekarang->subMonth();
        }

        return view('dashboard', compact(
            'totalSiswa',
            'kasTerkumpul',
            'sudahLunas',
            'belumLunas',
            'pembayaranTerbaru',
            'statusLunas',
            'statusBelumLunas',
            'bulan',
            'tahun',
            'daftarBulan',
            'tahunList'
        ));
    }
}