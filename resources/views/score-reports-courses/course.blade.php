<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Course / Select course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class=" flex items-center justify-between pb-8">
                    <div>
                        <h2 class="text-gray-600 text-2xl font-semibold">{{ __('Courses') }}</h2>
                        <span>{{ $grade->name }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="lg:ml-40 ml-10 space-x-8">
                            <a href="{{ route('scoreReportsCourse.index') }}" class="tracking-wide cursor-pointer
                                px-4 py-3 text-sm text-gray-700 transition-colors duration-200 bg-white border border-indigo-500 hover:border-indigo-700 rounded-lg hover:bg-gray-100">
                                <span>Go back</span>
                            </a>
                        </div>
                    </div>
                </div>

                <table id="example" class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __('Courses') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td class="border px-4 py-2 flex justify-between items-center">
                                {{ $course->course->name }}
                                <div class="p-3 flex">
                                    <a href="{{ route('scoreReportsCourse.period', [$grade, $course->course->id]) }}"
                                       class="text-indigo-500 hover:text-indigo-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </span>
                                        <span>Ver calificaciones</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            <style>
                /* Add your custom styles here */
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    background-color: #9195F6; /* Cambia a tu color morado */
                    color: #fff;
                    padding: 0.5rem 1rem; /* Ajusta segÃºn sea necesario */
                    border-radius: 9999px; /* Hace que los botones sean redondos */
                    margin-right: 0.5rem; /* Espaciado entre los botones */
                    margin-top: 1.5rem;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
                .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                    background-color: #6c4ca9; /* Cambia a tu color morado oscuro */
                }

                /* Add your custom styles here */
                .dataTables_info {
                    margin-top: 1.5rem /* Ajusta el tamaño de fuente según sea necesario */
                }

            </style>


        </div>
    </div>

</x-app-layout>
