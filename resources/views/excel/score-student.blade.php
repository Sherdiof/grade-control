<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Student</title>
</head>
<body>
<table class="leading-normal table-fixed border-separate border border-slate-400">
    <thead>
    <tr>
        <th>{{ __('Course') }}</th>
        <th>{{ __('Score') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        @if(!empty($student['scores'])) {{-- Verificar si el estudiante tiene puntajes --}}
        @foreach($courses as $course)
            <tr>
                <td>{{ $course }}</td>
                <td>
                    @if(isset($student['scores'][$course]))
                        {{ $student['scores'][$course] }}
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td><p>PROMEDIO</p></td>
            <td>{{ number_format($student['average'], 2) }}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
</body>
</html>
