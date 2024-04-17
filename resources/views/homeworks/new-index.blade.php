<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeworks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="container mx-auto">
                        <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2 mb-5">
                            <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">
                                <span
                                    class="my-4 ml-5 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                                     {{ __('Select Course') }}

                                </span>

                            </div>
                            <div class="flex justify-end ml-10">
                                <a href="{{ route('homeworks.groupHomeworksGrades') }}"
                                   class="inline-flex items-center px-4 py-3 bg-gray-50 border border-solid rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Score homeworks') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($courses as $course)
                            <a href="{{ route('homeworks.show-homeworks', $course) }}"
                               class="relative flex h-full flex-col rounded-md border border-gray-200 bg-white p-2.5 hover:border-gray-400 sm:rounded-lg sm:p-5">
                                <span class="text-md mb-0 font-semibold text-gray-900 hover:text-black sm:mb-1.5 sm:text-xl">
                                  {{ $course->name }}
                                </span>
                                <span class="text-sm leading-normal text-gray-400 sm:block">

                                </span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                <div class="my-10 mx-5">
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
