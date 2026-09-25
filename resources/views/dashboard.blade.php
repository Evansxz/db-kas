<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sistem Kas Kelas</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0f172a;
            color: #f8fafc;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 70px;
            background: #111827;
            border-bottom: 1px solid #1f2937;

            display: flex;
            align-items: center;
            padding: 0 40px;

            justify-content: space-between;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-menu a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #ffffff;
        }

        .nav-menu a.active {
            color: #ffffff;
            font-weight: 600;
        }

        /* =========================
           USER
        ========================= */

        .user-area {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #2563eb;
            color: white;

            font-size: 13px;
            font-weight: bold;
        }

        .user-name {
            font-size: 14px;
            color: #e2e8f0;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1250px;
            margin: auto;
            padding: 40px;
        }

        .breadcrumb {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .page-description {
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 22px;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 700;
            color: #ffffff;
        }

        .stat-sub {
            margin-top: 7px;
            color: #64748b;
            font-size: 12px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 20px;
        }

        .panel {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 24px;
        }

        .panel-title {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
            padding: 12px 8px;
            border-bottom: 1px solid #1f2937;
        }

        td {
            padding: 14px 8px;
            font-size: 13px;
            color: #cbd5e1;
            border-bottom: 1px solid #1f2937;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-lunas {
            background: rgba(34, 197, 94, 0.12);
            color: #4ade80;
        }

        .status-belum {
            background: rgba(239, 68, 68, 0.12);
            color: #f87171;
        }

        /* =========================
           STATUS PEMBAYARAN
        ========================= */

        .payment-status {
            margin-bottom: 24px;
        }

        .status-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 9px;
            font-size: 13px;
        }

        .status-header span:first-child {
            color: #cbd5e1;
        }

        .status-header span:last-child {
            color: #94a3b8;
        }

        .progress {
            height: 8px;
            background: #1f2937;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-lunas {
            height: 100%;
            background: #22c55e;
        }

        .progress-belum {
            height: 100%;
            background: #ef4444;
        }

        /* =========================
           LOGOUT
        ========================= */

        .logout-form {
            margin-left: 18px;
        }

        .logout-button {
            border: none;
            background: transparent;
            color: #64748b;
            font-size: 13px;
            cursor: pointer;
        }

        .logout-button:hover {
            color: #ef4444;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 950px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 0 20px;
            }

            .container {
                padding: 30px 20px;
            }
        }

        @media (max-width: 650px) {

            .nav-menu {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <div class="logo">
            Sistem Kas Kelas
        </div>

        <div class="nav-menu">

            <a href="{{ route('dashboard') }}" class="active">
                Dashboard
            </a>

            <a href="{{ url('/siswa') }}">
                Data siswa
            </a>

            <a href="{{ url('/pembayaran') }}">
                Data pembayaran
            </a>

        </div>

        <div class="user-area">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'EV', 0, 2)) }}
            </div>

            <span class="user-name">
                {{ auth()->user()->name ?? 'User' }}
            </span>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="logout-form">

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
            Dashboard
        </div>

        <h1 class="page-title">
            Dashboard
        </h1>

        <p class="page-description">
            Ringkasan kas kelas 12 RPL 1
        </p>


        {{-- =========================
             STATISTICS
        ========================== --}}

        <section class="stats">

            {{-- TOTAL SISWA --}}
            <div class="stat-card">

                <div class="stat-label">
                    Total siswa
                </div>

                <div class="stat-value">
                    {{ $totalSiswa }}
                </div>

                <div class="stat-sub">
                    siswa terdaftar
                </div>

            </div>


            {{-- KAS TERKUMPUL --}}
            <div class="stat-card">

                <div class="stat-label">
                    Kas terkumpul
                </div>

                <div class="stat-value">
                    Rp{{ number_format($kasTerkumpul, 0, ',', '.') }}
                </div>

                <div class="stat-sub">
                    pembayaran lunas
                </div>

            </div>


            {{-- SUDAH LUNAS --}}
            <div class="stat-card">

                <div class="stat-label">
                    Sudah lunas
                </div>

                <div class="stat-value">
                    {{ $sudahLunas }}
                </div>

                <div class="stat-sub">
                    siswa
                </div>

            </div>


            {{-- BELUM LUNAS --}}
            <div class="stat-card">

                <div class="stat-label">
                    Belum lunas
                </div>

                <div class="stat-value">
                    {{ $belumLunas }}
                </div>

                <div class="stat-sub">
                    siswa
                </div>

            </div>

        </section>


        {{-- =========================
             LOWER CONTENT
        ========================== --}}

        <section class="content">


            {{-- PEMBAYARAN TERBARU --}}
            <div class="panel">

                <h2 class="panel-title">
                    Pembayaran terbaru
                </h2>

                <table>

                    <thead>

                        <tr>
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($pembayaranTerbaru as $pembayaran)

                            <tr>

                                <td>
                                    {{ $pembayaran->siswa->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d/m/Y') }}
                                </td>

                                <td>
                                    Rp{{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if ($pembayaran->status === 'lunas')

                                        <span class="status status-lunas">
                                            Lunas
                                        </span>

                                    @else

                                        <span class="status status-belum">
                                            Belum lunas
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">
                                    Belum ada pembayaran.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- STATUS PEMBAYARAN --}}
            <div class="panel">

                <h2 class="panel-title">
                    Status pembayaran
                </h2>


                {{-- LUNAS --}}

                <div class="payment-status">

                    <div class="status-header">

                        <span>
                            Sudah lunas
                        </span>

                        <span>
                            {{ $sudahLunas }} siswa
                        </span>

                    </div>

                    <div class="progress">

                        @php
                            $persenLunas = $totalSiswa > 0
                                ? ($sudahLunas / $totalSiswa) * 100
                                : 0;
                        @endphp

                        <div
                            class="progress-lunas"
                            style="width: {{ $persenLunas }}%">
                        </div>

                    </div>

                </div>


                {{-- BELUM LUNAS --}}

                <div class="payment-status">

                    <div class="status-header">

                        <span>
                            Belum lunas
                        </span>

                        <span>
                            {{ $belumLunas }} siswa
                        </span>

                    </div>

                    <div class="progress">

                        @php
                            $persenBelum = $totalSiswa > 0
                                ? ($belumLunas / $totalSiswa) * 100
                                : 0;
                        @endphp

                        <div
                            class="progress-belum"
                            style="width: {{ $persenBelum }}%">
                        </div>

                    </div>

                </div>


                {{-- RINGKASAN --}}

                <div style="
                    margin-top: 35px;
                    padding-top: 20px;
                    border-top: 1px solid #1f2937;
                ">

                    <!-- <div style="
                        color: #64748b;
                        font-size: 12px;
                        margin-bottom: 8px;
                    ">
                        Total pembayaran
                    </div>

                    <div style="
                        font-size: 24px;
                        font-weight: 700;
                    ">
                        {{ $sudahLunas + $belumLunas }}
                        siswa
                    </div> -->

                </div>

            </div>

        </section>

    </main>

</body>

</html>