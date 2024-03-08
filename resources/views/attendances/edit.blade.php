<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance / Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
                    <h2 class="text-2xl font-semibold mb-6 mx-auto text-center">{{ __('Edit Attendance of the Day') }} {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</h2>

                    <form action="{{ route('attendance.update', $class_id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        @include('attendances.form-edit')

                        <div class="p-2 mt-4 w-full">
                            <button type="submit"
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-1 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('Save') }}</button>
                        </div>
                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
