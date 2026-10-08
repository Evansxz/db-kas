@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('content')

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <div class="logo">
            Sistem Kas Kelas
        </div>


        <div class="nav-menu">

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('pembayaran.index') }}" class="active">
                Data pembayaran
            </a>

            <a href="{{ route('siswa.index') }}">
                Data siswa
            </a>

        </div>

        <div class="user-area">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'EV', 0, 2)) }}
            </div>

            <span class="user-name">
                {{ auth()->user()->name ?? 'User' }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">

                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>

            </form>

        </div>

    </nav>

    {{-- =========================
         MAIN
    ========================== --}}

    <main class="container">

        <div class="breadcrumb">
            Data pembayaran
        </div>

        <h1 class="page-title">
            Data Pembayaran
        </h1>

        <p class="page-description">
            Kelola pembayaran kas kelas 12 RPL 1
        </p>

        {{-- =========================
             DATA PEMBAYARAN
        ========================== --}}

        <section class="data-panel">

            <div class="panel-header">

                <div>

                    <h2 class="panel-title">
                        Daftar Pembayaran
                    </h2>

                    <p class="panel-description">
                        Data transaksi pembayaran kas kelas
                    </p>

                </div>

                <a href="{{ url('/pembayaran/create') }}" class="create-button">
                    + Buat Pembayaran
                </a>

            </div>

            <div class="table-wrapper">

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

                        @forelse ($pembayaran as $index => $item)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>{{ $item->siswa->nama }}</td>

                                <td>{{ $item->siswa->nis }}</td>

                                <td>{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d/m/Y') }}</td>

                                <td>Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>

                                <td>

                                    @if ($item->status === 'lunas')

                                        <span class="status status-lunas">
                                            Lunas
                                        </span>

                                    @else

                                        <span class="status status-belum">
                                            Belum lunas
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="actions">

                                        <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}" class="btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('pembayaran.destroy', $item->id_pembayaran) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
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

        </section>

    </main>

</body>