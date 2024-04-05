<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Grade</title>
</head>
<body>
<table class="leading-normal">
    <thead>
    <tr>
        <th
            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Nombre
        </th>
        @foreach($courses as $course)
            <th
                class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                {{$course}}
            </th>
        @endforeach
        <th
            class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
            Promedio
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td class="px-5 py-5 min-w-64 border-b border-white bg-indigo-200 text-sm">
                <p class="text-gray-900 whitespace-no-wrap">{{$student['name'] . ' - ' . $student['section']}}</p>
            </td>
            @foreach($courses as $course => $index)
                @php
                    $scores = $student['scores'];
                    $scoreFound = false;
                @endphp

                @foreach($scores as $score => $i)
                    @if($score === $index)
                        <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{$i}}
                            </p>
                        </td>
                        @php
                            $scoreFound = true;
                        @endphp
                    @endif
                @endforeach

                @if(!$scoreFound)
                    <td class="px-5 py-5 border-b border-r text-center border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            -
                        </p>
                    </td>
                @endif
            @endforeach
            <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-green-50 text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                    {{number_format($student['average'], 2)}}
                </p>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
