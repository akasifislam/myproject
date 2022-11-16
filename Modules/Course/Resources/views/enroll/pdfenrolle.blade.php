<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enroll File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-3">All Student Enroll</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>SL</th>
                    <th>Student</th>
                    <th>Course Name</th>
                    <th>Course Type</th>
                    <th>Enroll Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseEnrolles as $enroll)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            {{ $enroll->student->firstname . ' ' . $enroll->student->lastname }}
                            <br>
                            <small>Email: {{ $enroll->student->email }}</small>
                        </td>
                        <td>
                            {{ $enroll->course->title }}
                        </td>
                        <td>
                            {{ $enroll->course->course_type }}
                        </td>
                        <td>
                            {{ $enroll->created_at->format('d/m/y') }}, <br>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
