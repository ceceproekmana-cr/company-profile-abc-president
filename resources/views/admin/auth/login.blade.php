<!DOCTYPE html>
<html>

<head>

    <title>Login Admin</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background: #ffffff 100%);
        }

        .login-card {

            border: none;
            border-radius: 25px;

            overflow: hidden;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, .15);

        }

        .login-header {

            background:
                linear-gradient(135deg,
                    #dc3545,
                    #ff6b6b);

            color: white;

            text-align: center;

            padding: 30px;

        }

        .login-logo {

            width: 140px;

            margin-bottom: 10px;

        }

        .login-body {

            padding: 35px;

        }

        .form-control {

            border-radius: 12px;

            padding: 12px;

        }

        .btn-login {

            background: #dc3545;
            border: none;

            border-radius: 12px;

            padding: 12px;

            font-weight: bold;

            transition: .3s;

        }

        .btn-login:hover {

            background: #bb2d3b;

            transform: translateY(-2px);

        }

        .subtitle {

            font-size: 14px;

            opacity: .9;

        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5 col-lg-4">

                <div class="card login-card">

                    <div class="login-header">

                        <img src="{{ asset('logoABC.png') }}" class="login-logo">

                        <h3 class="mb-1">
                            Admin Panel
                        </h3>

                        <div class="subtitle">
                            PT. ABC President Indonesia
                        </div>

                    </div>

                    <div class="login-body">

                        @if (session('error'))
                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                </ul>

                            </div>
                        @endif
                        <form method="POST" action="/login">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan Email" value="{{ old('email') }}">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password">

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-login w-100 text-white">

                                Login

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
