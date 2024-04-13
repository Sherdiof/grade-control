<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
</head>
<body>
    <table class="leading-normal">
        <thead>
        <tr>
            <th
                class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Nombre
            </th>
            @foreach($dates as $date)
                <th
                    class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                    {{\Carbon\Carbon::parse($date)->format('d-m-Y')}}
                </th>
            @endforeach
            <th
                class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                Resumen
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td class="px-5 py-5 min-w-64 border-b border-white bg-indigo-200 text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{$student['name'] . ' - ' . $student['section']}}</p>
                </td>
                @foreach($dates as $date => $index)
                    @php
                        $attendances = $student['attendance'];
                    @endphp

                    @foreach($attendances as $attendance => $i)
                        @if($attendance === $index)
                            <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$i}}
                                </p>
                            </td>
                        @endif
                    @endforeach
                @endforeach
                <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-green-50 text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ __('Assist:') }} {{ $student['assist'] }}
                        <br>
                        {{ __('No Assist:') }} {{ $student['noAssist'] }}
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
