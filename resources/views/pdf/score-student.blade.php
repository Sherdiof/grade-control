<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Score</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container bg-white p-4 rounded-md">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h4 class="text-center text-gray-600 font-weight-bold">Calificaciones de {{ $period->name }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h5 class="text-gray-600 mt-2">
                <span class="font-weight-bold">Grado: </span>
                <span class="text-gray-600">{{ $grade->name }}</span>
            </h5>
            <h5 class="text-gray-600">
                <span class="font-weight-bold">Alumno: </span>
                <span class="text-gray-600">{{ $informationStudent->name }}</span>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col" class="px-4 py-2">Course</th>
                        <th scope="col" class="px-4 py-2">Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        @foreach($courses as $course => $index)
                            @php
                                $scores = $student['scores'];
                                $scoreFound = false;
                            @endphp
                            @foreach($scores as $score => $i)
                                <tr>
                                    @if($score === $index)
                                        <td class="px-4 py-2">{{$score}}</td>
                                        <td class="px-4 py-2">{{$i}}</td>
                                        @php
                                            $scoreFound = true;
                                        @endphp
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                        <tr>
                            <td class="px-4 py-2 font-weight-bold">PROMEDIO</td>
                            <td class="px-4 py-2">{{number_format($student['average'], 2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
