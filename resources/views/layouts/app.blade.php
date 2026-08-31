<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Sistem Kas Kelas')
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333333;
        }

        .navbar {
            background: #2222;
            padding: 15px 40px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 25px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #99C2FF;
            color: white;
        }

        .btn-warning {
            background: #FFDF82;
            color: white;
        }

        .btn-danger {
            background: #FF84BA;
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .alert {
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('siswa.index') }}">
        Sistem Kas Kelas
    </a>

    <a href="{{ route('siswa.index') }}">
        Data Siswa
    </a>

    <a href="{{ route('pembayaran.index') }}">
        Data Pembayaran
    </a>
</nav>

<div class="container">

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

</div>

</body>
</html>