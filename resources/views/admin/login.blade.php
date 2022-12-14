@php
    $setting = App\Models\WebsiteSettings::websiteSetting();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Education | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            @if ($setting->header_logo && file_exists($setting->header_logo))
            <a href="{{ route('admin.login') }}"><img height="50px" src="{{ asset($setting->header_logo) }}"
                alt=""></a>
            @else
            <a href="{{ route('admin.login') }}"><img height="50px" src="{{ asset('backend/image/headerlogo.png') }}"
                alt=""></a>
            @endif

        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') ? old('email') : 'admin@mail.com' }}" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email') <span class="invalid-feedback"
                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input value="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span> @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In <i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="{{ route('admin.forgot.password') }}">I forgot my password</a>
                </p>

            </div>
        </div>
    </div>

    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>

</body>

</html>
