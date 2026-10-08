<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Sistem Kas Kelas')
    </title>

</head>

    <main class="container">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        @yield('content')

    </main>

</head>

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
        ========================== */

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
            font-weight: 600;
        }

        /* =========================
           USER
        ========================== */

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
        ========================== */

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
           DATA PEMBAYARAN
        ========================== */

        .data-panel {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 24px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .panel-title {
            font-size: 17px;
            font-weight: 600;
        }

        .panel-description {
            color: #64748b;
            font-size: 12px;
            margin-top: 6px;
        }

        .create-button {
            display: inline-block;
            background: #16a34a;
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .create-button:hover {
            background: #15803d;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

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
        ========================== */

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
           ACTION
        ========================== */

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit,
        .btn-delete {
            border: none;
            border-radius: 7px;
            padding: 8px 13px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #f59e0b;
            color: #ffffff;
        }

        .btn-delete {
            background: #ef4444;
            color: #ffffff;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* =========================
           LOGOUT
        ========================== */

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
        ========================== */

        @media (max-width: 950px) {

            .navbar {
                padding: 0 20px;
            }

            .container {
                padding: 30px 20px;
            }

            .panel-header {
                align-items: flex-start;
                gap: 15px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

        }

        @media (max-width: 650px) {

            .nav-menu {
                display: none;
            }

            .panel-header {
                flex-direction: column;
            }

            .create-button {
                width: 100%;
                text-align: center;
            }

            th,
            td {
                white-space: nowrap;
            }

        }

    </style>

</html>