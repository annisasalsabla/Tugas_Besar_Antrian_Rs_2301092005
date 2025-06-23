<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Antrian RS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(90deg,rgb(38, 40, 185) 0%, #2575fc 100%);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-wrapper {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.12);
            padding: 0;
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
        }
        .login-illustration {
            background: #f5f8fb;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50%;
            min-height: 420px;
        }
        .login-illustration img {
            max-width: 90%;
        }
        .login-form-side {
            width: 50%;
            padding: 48px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form-side h3 {
            color: #0a2850;
            font-weight: bold;
            margin-bottom: 24px;
        }
        .form-label {
            font-weight: 600;
            color: #0a2850;
        }
        .btn-primary {
            background-color: #0a2850;
            border-color: #0a2850;
            font-weight: 600;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #09203f;
            border-color: #09203f;
        }
        .input-group-text {
            cursor: pointer;
            background-color: #e9ecef;
        }
        .alert {
            font-size: 14px;
        }
        @media (max-width: 900px) {
            .login-wrapper { flex-direction: column; max-width: 420px; }
            .login-illustration { display: none; }
            .login-form-side { width: 100%; padding: 36px 18px; }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-illustration d-none d-md-flex">
            <img src="https://img.freepik.com/free-vector/doctor-character-background_1270-84.jpg" alt="Ilustrasi Login">
        </div>
        <div class="login-form-side">
            <h3 class="text-center mb-4">Login Admin / Petugas</h3>
            @if($errors->any())
                <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control shadow-sm" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control shadow-sm" id="password" name="password" required>
                        <span class="input-group-text" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <a href="/" class="btn btn-outline-secondary w-100 mt-3" style="border-radius:10px; font-weight:600;">Kembali</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
