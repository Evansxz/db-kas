<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kas Kelas</title>
</head>

<body>

    <h1>Sistem Kas Kelas</h1>
    <p>Masuk untuk mengelola kas 12 RPL 1</p>

    @if ($errors->any())
        <div>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <div>
            <label>NIS atau username</label>
            <input
                type="text"
                name="username"
                value="{{ old('username') }}"
                required
            >
        </div>

        <div>
            <label>Kata sandi</label>
            <input
                type="password"
                name="password"
                required
            >
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>
        </div>

        <button type="submit">Masuk</button>
    </form>

</body>
</html>