<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Menampilkan semua pembayaran
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa')
            ->orderBy('id_pembayaran', 'desc')
            ->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Menampilkan form tambah pembayaran
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();

        return view('pembayaran.create', compact('siswa'));
    }

    /**
     * Menyimpan pembayaran baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1',
            'status' => 'required|max:30',
        ]);

        Pembayaran::create([
            'id_siswa' => $request->id_siswa,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pembayaran
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::orderBy('nama', 'asc')->get();

        return view('pembayaran.edit', compact('pembayaran', 'siswa'));
    }

    /**
     * Mengupdate pembayaran
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1',
            'status' => 'required|max:30',
        ]);

        $pembayaran->update([
            'id_siswa' => $request->id_siswa,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus pembayaran
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}