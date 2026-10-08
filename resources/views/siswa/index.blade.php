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

            <a href="{{ route('pembayaran.index') }}">
                Data pembayaran
            </a>

            <a href="{{ route('siswa.index') }}" class="active">
                Data siswa
            </a>

        </div>

        <div class="user-area">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>

            <span class="user-name">
                {{ auth()->user()->name ?? 'User' }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">

                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>

            </form >

        </div>

    </nav>


    {{-- =========================
         CONTENT
    ========================== --}}

    <main class="container">

        <div class="breadcrumb">
            Data siswa
        </div>


        <h1 class="page-title">
            Data Siswa
        </h1>


        <p class="page-description">
            Kelola data siswa kelas 12 RPL 1
        </p>


        {{-- =========================
             DATA SISWA
        ========================== --}}

        <section class="data-panel">


            <div class="panel-header">


                <div>

                    <h2 class="panel-title">
                        Daftar Siswa
                    </h2>


                    <p class="panel-description">
                        Data siswa yang terdaftar dalam sistem kas kelas
                    </p>

                </div>


                <a href="{{ route('siswa.create') }}"
                   class="create-button">

                    + Tambah Siswa

                </a>


            </div>


            <div class="table-wrapper">


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


                        @forelse ($siswa as $index => $item)


                            <tr>


                                <td>
                                    {{ $index + 1 }}
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
                                           class="btn-edit">

                                            Edit

                                        </a>


                                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
                                              method="POST">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn-delete">

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


        </section>


    </main>


</body>
