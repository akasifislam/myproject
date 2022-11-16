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
        <h2 class="text-center mb-3">All Courses </h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-primary">
                    <th>SL</th>
                    <th>Course Title</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Instructor Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td> {{ $course->title }}  </td>
                        <td> {{ $course->category->name }}  </td>
                        <td> {{ $course->price ? $course->price : '-' }}  </td>
                        <td> {{ $course->discount_price ? $course->discount_price : '-' }}  </td>
                        <td> {{ $course->instructor->firstname . ' ' . $course->instructor->lastname }}  </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>