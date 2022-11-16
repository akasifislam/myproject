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
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form action="{{ route('instructor.password.email') }}" method="post">
                @csrf
              <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"" placeholder="Email" name="email" value="{{ old('email') }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('email') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong></span> @enderror
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <p class="mt-3 mb-1">
              <a href="{{ route('instructor.login') }}">Login</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/instructorlte.min.js"></script>

</body>

</html>
