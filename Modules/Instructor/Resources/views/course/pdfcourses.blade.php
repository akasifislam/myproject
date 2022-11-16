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
        <h2 class="text-center mb-3">My Course Instructor</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>sl</th>
                    <th>price</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Course Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $key => $course)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->course_type  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>