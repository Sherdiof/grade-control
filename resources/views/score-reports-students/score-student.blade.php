<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Student') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full flex justify-center mx-4 rounded shadow mt-7 max-w-xl">
            <a href="{{ route('scoreReportsStudents.select-student', [$grade, $period]) }}" aria-current="false"
               class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Go back
            </a>

            <a href="#" aria-current="page"
               class="w-full flex justify-center font-medium px-5 py-2 bg-indigo-400 text-white hover:bg-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Dercargar XLS
            </a>

            <a href="{{ route('scoreReportsStudents.select-student', [$grade, $period]) }}" aria-current="false"
               class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Descargar PDF

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
