<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Student') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full flex justify-center mx-4 rounded shadow mt-7 max-w-xl">
            <a href="{{ route('scoreReportsStudents.excel', ['grade' => $grade, 'period' => $period, 'student' => $informationStudent->id]) }}" aria-current="false"
               class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                Export to Excel
            </a>

            <a href="#" aria-current="page"
               class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                Popular
            </a>

            <a href="{{ route('scoreReportsStudents.select-student', [$grade, $period]) }}" aria-current="false"
               class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                Back
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z">
                    </path>
                </svg>
            </a>
        </div>
    </div>

    <div class="py-12">
        <div class=" max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

{{--                <!-- component -->--}}
{{--                <div class="flex items-center justify-end">--}}
{{--                    <div class="lg:ml-40 ml-10 space-x-8">--}}
{{--                        <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">New Report</button>--}}
{{--                        <a href="{{ route('scoreReportsStudents.select-student', [$grade, $period]) }}" class="tracking-wide cursor-pointer--}}
{{--                                px-4 py-3 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg hover:bg-gray-100">--}}
{{--                            <span>Go back</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="bg-white p-8 rounded-md w-full">
                    <div class=" flex items-center justify-center pb-6">
                        <div>
                            <h2 class="text-center mt-5 text-gray-600 text-4xl font-semibold">Calificaciones de la {{ $period->name }}</h2>

                        </div>
                    </div>

                    <div>
                        <div class="px-10">
                            <h2 class="text-gray-600 mt-10 text-xl">
                                <span class="font-semibold">Grado: </span>
                                <span class="text-gray-600 text-xl">{{ $grade->name }}</span>
                            </h2>
                            <h2 class="text-gray-600 text-xl">
                                <span class="font-semibold">Alumno: </span>
                                <span class="text-gray-600 text-xl">{{ $informationStudent->name }}</span>
                            </h2>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 relative overflow-y-auto justify-center flex overflow-x-auto">
                            <div class="inline-block shadow rounded-lg  overflow-hidden">
                                <table class="leading-normal table-fixed border-separate border border-slate-400">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-blue-800 text-left text-md font-semibold text-gray-50 uppercase tracking-wider">
                                            {{ __('Course') }}
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-blue-800 border-r text-md text-center font-semibold text-gray-50 uppercase tracking-wider">
                                            {{ __('Score') }}
                                        </th>
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
                                                        <td class="px-5 py-5 min-w-[600px] border-b border-r border-gray-200 bg-white text-sm">
                                                            <p class="text-gray-900 whitespace-no-wrap">{{$score}}</p>
                                                        </td>
                                                        <td class="px-5 py-5  min-w-64 text-center border-b border-r border-gray-200 bg-white text-sm">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{$i}}
                                                            </p>
                                                        </td>
                                                        @php
                                                            $scoreFound = true;
                                                        @endphp
                                                    @endif


                                                </tr>
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td class="px-5 py-5 min-w-64 border-b border-white bg-gray-100 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap font-bold">PROMEDIO</p>
                                            </td>
                                            <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-gray-100 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{number_format($student['average'], 2)}}
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
