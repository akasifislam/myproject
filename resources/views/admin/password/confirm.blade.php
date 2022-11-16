@php
$setting = App\Models\WebsiteSettings::websiteSetting();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zakir Soft | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <style>
        .login-box, .register-box {
            width: 450px;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <div class="login-logo">
                @if ($setting->header_logo && file_exists($setting->header_logo))
                <a href="{{ route('admin.login') }}"><img height="50px" src="{{ asset($setting->header_logo) }}"
                    alt=""></a>
                @else
                <a href="{{ route('admin.login') }}"><img height="50px" src="{{ asset('backend/image/headerlogo.png') }}"
                    alt=""></a>
                @endif
            </div>
          </div>
          <div class="card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Admin Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-1">
              <a href="{{ route('admin.login') }}">Login</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>

</body>

</html>
