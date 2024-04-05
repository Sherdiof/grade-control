<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <!-- component -->
                <div class="flex justify-between mt-10 px-8">
                    <div>
                        <h2 class="text-gray-600 text-4xl font-semibold">CUADROS DE ZONA
                        </h2>
                        <span class="text-md text-2xl">{{ $period->name }}</span>
                    </div>

                    <div class="flex items-center justify-end mt-2">
                        <div class="lg:ml-40 ml-10 space-x-8">
                            <a href="{{ route('scoreReportsCourse.excel', ['grade' => $grade, 'course' => $course, 'period' => $period]) }}" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">{{ __('Export to Excel') }}</a>
                            <a href="{{ route('scoreReportsCourse.period', [$grade, $course]) }}" class="tracking-wide cursor-pointer
                                px-4 py-3 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg hover:bg-gray-100">
                                <span>Go back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-md w-full">
                    <div class=" flex items-center justify-between pb-1">
                        <div>

                            <h2 class="mt-10 text-gray-600 text-xl">
                                <span class="font-semibold">Curso: </span>
                                <span class="text-gray-600">{{ $course->name }}</span>
                            </h2>
                            <h2 class="text-gray-600 text-xl">
                                <span class="font-semibold">Grado: </span>
                                <span class="text-gray-600">{{ $grade->name }}</span>
                            </h2>
                        </div>

                    </div>
                    <div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 relative overflow-y-auto max-h-[60rem] overflow-x-auto">
                            <div class="inline-block shadow rounded-lg  overflow-hidden">
                                <table class="leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Nombre
                                        </th>
                                        @foreach($homeworks as $homework)
                                            <th
                                                class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                                                {{ $homework }}
                                            </th>
                                        @endforeach
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                                            Total
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td class="px-5 py-5 min-w-64 border-b border-white bg-indigo-200 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$student['name'] . ' - ' . $student['section']}}</p>
                                            </td>
                                            @foreach($homeworks as $homework => $index)
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
                                                    {{number_format($student['totalScore'], 2)}}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
