<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-3">All Student </h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Nationality</th>
                    <th>Profession</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                        <td>{{  $student->email }}</td>
                        <td>{{  $student->phone }}</td>
                        <td>{{ $student->nationality }}</td>
                        <td>{{ $student->profession }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>