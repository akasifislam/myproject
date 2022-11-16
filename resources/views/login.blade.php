<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Login</title>
  </head>
  <body>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <a href="{{ route('admin.login') }}" class="btn btn-primary ml-1">Admin</a>
        <a href="{{ route('instructor.login') }}" class="btn btn-primary ml-1">Instructor</a>
        <a href="{{ route('login.student') }}" class="btn btn-primary ml-1">Student</a>
    </div>
  </body>
</html>
