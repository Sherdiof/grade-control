<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance / Select grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                    <div class="flex w-full">
                        <div class="flex justify-end  pb-10 w-full">
                            <div
                                class="flex justify-center px-4 items-center py-2 mr-2 text-sm text-green-800 rounded-lg bg-green-50 w-full"
                                role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="p-3 text-lg text-gray-600 font-bold">
                    {{ $grade->name }}
                </div>

                @foreach($classes as $class)
                    <div class="flex items-center justify-between border-b border-t mb-5">
                        <div
                            class="p-3 text-gray-700 text-lg uppercase font-semibold">{{ __('section') }} {{ $class->name }}</div>
                        <div class="p-3 flex">
                            <a href="{{ route('attendance.selectDatetoShow', ['grade' => $grade, 'class' => $class->id]) }}"
                               class="text-indigo-500 mr-2 hover:text-indigo-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </span>
                                <span>Ver asistencias</span>
                            </a>
                            <a href="{{ route('attendance.selectDate', ['grade' => $grade, 'class' => $class]) }}"
                               class="text-indigo-500 hover:text-indigo-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                            </svg>
                                        </span>
                                <span>Tomar asistencia</span>
                            </a>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('attendance.index') }}"
                   class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
                    </svg>
                    <span>Go back</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
