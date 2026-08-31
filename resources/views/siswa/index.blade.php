@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

<div class="card">

    <h1>Data Siswa</h1>

    <a href="{{ route('siswa.create') }}"
       class="btn btn-primary">
        + Tambah Siswa
    </a>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($siswa as $item)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->nis }}
                </td>

                <td>
                    {{ $item->nama }}
                </td>

                <td>
                    {{ $item->jabatan }}
                </td>

                <td>
                    {{ $item->kelas }}
                </td>

                <td>
                    <div class="actions">

                        <a href="{{ route('siswa.edit', $item->id_siswa) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">
                                Hapus
                            </button>

                        </form>

                    </div>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="6">
                    Belum ada data siswa.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection 