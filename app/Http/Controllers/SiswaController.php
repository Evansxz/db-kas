<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan semua data siswa
     */
    public function index()
    {
        $siswa = Siswa::orderBy('id_siswa', 'desc')->get();

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan form tambah siswa
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Menyimpan siswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|max:20|unique:siswa,nis',
            'nama' => 'required|max:100',
            'jabatan' => 'required|max:50',
            'kelas' => 'required|max:50',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kelas' => $request->kelas,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit siswa
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Mengupdate data siswa
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|max:20|unique:siswa,nis,' . $id . ',id_siswa',
            'nama' => 'required|max:100',
            'jabatan' => 'required|max:50',
            'kelas' => 'required|max:50',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kelas' => $request->kelas,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Menghapus siswa
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}