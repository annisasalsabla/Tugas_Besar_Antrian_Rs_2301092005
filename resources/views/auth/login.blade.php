@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background-color: #0a2850;
        font-family: 'Poppins', sans-serif;
    }

    .login-container {
        margin-top: 100px;
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        font-weight: 600;
        color: #0a2850;
    }

    .btn-primary {
        background-color: #0a2850;
        border-color: #0a2850;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #09203f;
        border-color: #09203f;
    }

    .text-center h3 {
        color: #0a2850;
        font-weight: bold;
    }

    .input-group-text {
        cursor: pointer;
        background-color: #e9ecef;
    }

    .alert {
        font-size: 14px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 login-container">
            <div class="text-center mb-4">
                <h3>Login Admin / Petugas</h3>
            </div>
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
        </div>
    </div>
</div>

<!-- FontAwesome for Eye Icon -->
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
@endsection
