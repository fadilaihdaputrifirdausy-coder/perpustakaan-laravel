<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | SIMPERPUS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>

        body{

            background:linear-gradient(135deg,#6f5cf1,#8b7cf7);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:'Segoe UI',sans-serif;

        }

        .login-card{

            width:420px;
            border:none;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 20px 50px rgba(0,0,0,.25);

        }

        .card-body{

            padding:45px;

        }

        .logo{

            font-size:60px;

        }

        .title{

            font-weight:bold;
            color:#343a40;

        }

        .subtitle{

            color:#777;
            margin-bottom:30px;

        }

        .form-control{

            height:50px;
            border-radius:12px;

        }

        .btn-login{

            background:#6f5cf1;
            border:none;
            border-radius:12px;
            height:50px;
            font-weight:bold;

        }

        .btn-login:hover{

            background:#5b48e4;

        }

    </style>

</head>

<body>

<div class="card login-card">

    <div class="card-body">

        <div class="text-center">

            <div class="logo">
                📚
            </div>

            <h2 class="title">
                SIMPERPUS
            </h2>

            <p class="subtitle">
                Login Administrator
            </p>

        </div>

        @if ($errors->has('login'))

            <div class="alert alert-danger">

                {{ $errors->first('login') }}

            </div>

        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="mb-3">

                <input
                type="text"
                name="username"
                class="form-control @error('username') is-invalid @enderror"
                placeholder="Username"
                value="{{ old('username') }}">

            @error('username')

            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>

            @enderror

            </div>

            <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <div class="input-group">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan password">

                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="togglePassword">

                            <i class="bi bi-eye"></i>

                        </button>

                        @error('password')

                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>

                        @enderror

                </div>

            </div>

            <button class="btn btn-primary btn-login w-100">

                <i class="bi bi-box-arrow-in-right"></i>

                Login

            </button>

        </form>

    </div>

</div>

<script>

const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const icon = togglePassword.querySelector('i');

togglePassword.addEventListener('click', function () {

    if (password.type === 'password') {

        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }

});

</script>

</body>
</html>