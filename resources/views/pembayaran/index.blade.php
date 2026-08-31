@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('content')

<div class="card">

    <h1>Data Pembayaran</h1>

    <a href="{{ route('pembayaran.create') }}"
       class="btn btn-primary">
        + Tambah Pembayaran
    </a>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>NIS</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($pembayaran as $item)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    @if($item->siswa)
                        {{ $item->siswa->nama }}
                    @else
                        Siswa sudah dihapus
                    @endif
                </td>

                <td>
                    @if($item->siswa)
                        {{ $item->siswa->nis }}
                    @else
                        -
                    @endif
                </td>

                <td>
                    {{ $item->tanggal_bayar }}
                </td>

                <td>
                    Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
                </td>

                <td>
                    {{ $item->status }}
                </td>

                <td>
                    <div class="actions">

                        <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('pembayaran.destroy', $item->id_pembayaran) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?');">

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
                <td colspan="7">
                    Belum ada data pembayaran.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection