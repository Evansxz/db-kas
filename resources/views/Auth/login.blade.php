<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Kas Kelas</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            background: #0f172a;
            color: #f8fafc;
        }

        /* =========================
           LOGIN CONTAINER
        ========================== */

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 16px;
            padding: 38px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
        }

        /* =========================
           HEADER
        ========================== */

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo {
            width: 54px;
            height: 54px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #2563eb;
            color: white;
            font-size: 20px;
            font-weight: 700;
        }

        .login-header h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.5;
        }

        /* =========================
           ERROR
        ========================== */

        .error-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 8px;
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #f87171;
            font-size: 13px;
        }

        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #334155;
            border-radius: 8px;
            background: #0f172a;
            color: #f8fafc;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .form-input::placeholder {
            color: #64748b;
        }

        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* =========================
           REMEMBER
        ========================== */

        .remember {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .remember label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            font-size: 13px;
            cursor: pointer;
        }

        .remember input {
            width: 15px;
            height: 15px;
            accent-color: #2563eb;
            cursor: pointer;
        }

        /* =========================
           BUTTON
        ========================== */

        .login-button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #1d4ed8;
        }

        .login-button:active {
            transform: scale(0.99);
        }

        /* =========================
           FOOTER
        ========================== */

        .login-footer {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 12px;
        }

        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 480px) {

            .login-container {
                padding: 15px;
            }

            .login-card {
                padding: 28px 22px;
            }

            .login-header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>


<body>

    <div class="login-container">

        <div class="login-card">

            {{-- HEADER --}}
            <div class="login-header">
                <div class="login-logo">
                    Kas
                </div>

                <h1>
                    Sistem Kas Kelas
                </h1>

                <p>
                    Masuk untuk mengelola kas 12 RPL 1
                </p>
            </div>


            {{-- ERROR --}}
            @if ($errors->any())

                <div class="error-message">
                    {{ $errors->first() }}
                </div>

            @endif


            {{-- FORM --}}
            <form method="POST" action="{{ route('login.process') }}">

                @csrf

                {{-- USERNAME --}}
                <div class="form-group">
                    <label for="username">
                        NIS atau username
                    </label>

                    <input id="username" class="form-input" type="text" name="username" value="{{ old('username') }}"
                        placeholder="Masukkan NIS atau username" autocomplete="username" required autofocus>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">
                    <label for="password">
                        Kata sandi
                    </label>

                    <input id="password" class="form-input" type="password" name="password"
                        placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                </div>

                {{-- REMEMBER --}}
                <div class="remember">
                    <label>
                        <input type="checkbox" name="remember" value="1">
                        Ingat saya
                    </label>
                </div>


                {{-- BUTTON --}}
                <button type="submit" class="login-button">
                    Masuk
                </button>

            </form>


            {{-- FOOTER --}}
            <div class="login-footer">
                Khusus pengurus kas kelas 12 RPL 1
            </div>

        </div>

    </div>

</body>
</html>