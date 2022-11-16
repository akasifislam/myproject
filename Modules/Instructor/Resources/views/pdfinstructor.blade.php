<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Student Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-3">All Student Info</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $instructor->firstname . ' ' . $instructor->lastname }}</td>
                        <td>{{  $instructor->email }}</td>
                        <td>{{ $instructor->phone ? $instructor->phone : '-' }}</td>
                        <td>{{ $instructor->gender }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>