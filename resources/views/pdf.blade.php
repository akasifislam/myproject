<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .content-info {
            background: #f9f9f9;
            padding: 40px 0;
            background-size: cover !important;
            background-position: top center !important;
            background-repeat: no-repeat !important;
            position: relative;
            padding-bottom: 100px
        }

        table {
            width: 100%;
            background: #fff;
            border: 1px solid #dedede
        }

        table thead tr th {
            padding: 20px;
            border: 1px solid #dedede;
            color: #000
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background: #f9f9f9
        }

        table.result-point tr td.number {
            width: 100px;
            position: relative
        }

        .text-left {
            text-align: left !important
        }

        table tr td {
            padding: 10px 20px;
            border: 1px solid #dedede
        }

        table.result-point tr td .fa.fa-caret-up {
            color: green
        }

        table.result-point tr td .fa {
            font-size: 20px;
            position: absolute;
            right: 20px
        }

        table tr td {
            padding: 10px 40px;
            border: 1px solid #dedede
        }

        table tr td img {
            max-width: 32px;
            float: left;
            margin-right: 11px;
            margin-top: 1px;
            border: 1px solid #dedede
        }

    </style>
</head>

<body>
    <section class="content-info">
        <div class="container paddings-mini">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table-striped table-responsive table-hover result-point">
                        <tbody class="text-center">
                            <tr>
                                <th>Title</th>
                                <td>{{ $course->title }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>${{ $course->price }}</td>
                            </tr>
                            <tr>
                                <th>Discount Price</th>
                                <td>${{ $course->discount_price }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $course->level }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $course->duration }} Hours</td>
                            </tr>
                            <tr>
                                <th>Course Type</th>
                                <td>{{ $course->course_type }}</td>
                            </tr>
                            <tr>
                                <th>Video Type</th>
                                <td>{{ $course->video_type }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $course->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
