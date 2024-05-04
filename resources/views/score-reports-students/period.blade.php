<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Students / Period') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="bg-white dark:bg-gray-900">
                    <div class="container px-6 py-8 mx-auto">

                        <p class="text-xl text-center text-gray-500">
                            {{ $grade->name }}
                        </p>
                        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">{{ __('Choose a period') }}</h1>

                        <div class="mt-6 space-y-8 xl:mt-12">
                            @foreach($periods as $period)
                                <a href="{{ route('scoreReportsStudents.select-student', [$grade, $period]) }}" class="flex items-center justify-between text-gray-500 hover:border-violet-700 hover:text-violet-700 max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5  sm:h-9 sm:w-9" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                  clip-rule="evenodd"/>
                                        </svg>

                                        <div class="flex flex-col items-center mx-5 space-y-1">
                                            <h2 class="text-lg font-medium sm:text-2xl ">
                                                {{ $period->name }}
                                            </h2>
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-semibold sm:text-4xl ">
                                        {{ $period->year }}
                                    </h2>
                                </a>
                            @endforeach
                                {{--<a href="{{ route('scoreReportsStudents.select-student', [$grade, 'period' => 'promedio-general']) }}" class="flex items-center justify-between text-gray-500 hover:border-violet-700 hover:text-violet-700 max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5  sm:h-9 sm:w-9" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                  clip-rule="evenodd"/>
                                        </svg>

                                        <div class="flex flex-col items-center mx-5 space-y-1">
                                            <h2 class="text-lg font-medium sm:text-2xl ">
                                                Promedio General
                                            </h2>
                                        </div>
                                    </div>

                                    <h2 class="text-2xl font-semibold sm:text-4xl ">
                                        -
                                    </h2>
                                </a>--}}
                            <div class="p-2 pt-8 mt-8 mx-auto border-t border-gray-200 text-center">
                                <a href="{{ route('scoreReportsStudents.index') }}" class="max-w-2xl px-8 mx-auto border cursor-pointer rounded-xl w-full flex items-center justify-center py-2 text-sm text-gray-700 transition-colors duration-200 bg-white gap-x-2 sm:w-auto hover:bg-gray-100">
                                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>
                                    <span>Go back</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
