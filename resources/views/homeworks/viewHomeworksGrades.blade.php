<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeworks for grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                    <div class="flex justify-center px-4 p-4 mb-4 mt-5 text-sm text-green-800 rounded-lg bg-green-50"
                         role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div
                    class="relative w-full bg-white px-6 pt-10 pb-8 mt-8  sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10">
                    <div class="mx-auto px-5">

                        <div class="flex flex-col items-center">
                            <h2 class="mt-5 text-center text-3xl font-bold tracking-tight md:text-4xl">{{ $assigment->course->name }}</h2>
                            <p class="mt-3 text-2xl text-neutral-500 md:text-xl">{{ $assigment->grade->name }}

                            </p>
                        </div>

                        @foreach($homeworks as $homework)
                            <div class="mx-auto mt-8 grid max-w-xl divide-y divide-neutral-200">
                                <div class="py-5">
                                    <details class="group">
                                        <summary
                                            class="flex cursor-pointer list-none items-center justify-between font-medium">
                                            <span>
                                            <a href="{{ route('homework.register',['homework_id' => $homework->id, 'assigment_id' => $homework->assigment_id]) }}" class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                                Calificar
                                            </a>
                                             {{ $homework->name }}</span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                     stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <p class="group-open:animate-fadeIn ml-5 mt-8 text-neutral-600">
                                            Value: {{ $homework->value }}
                                        </p>
                                        <p class="group-open:animate-fadeIn ml-5 mt-3 text-neutral-600">
                                            Descripción: {{ $homework->description }}
                                        </p>
                                        <p class="group-open:animate-fadeIn ml-5 mt-3 text-neutral-600">
                                            Periodo: {{ $homework->period->name }}
                                        </p>
                                    </details>
                                </div>
                            </div>
                        @endforeach

                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                            <a href="{{ route('homeworks.groupHomeworksGrades') }}"
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
                <div class="my-10 px-12 mx-5">
                    {{$homeworks->links()}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
