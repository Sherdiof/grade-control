<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Students / Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
                    <h2 class="text-2xl font-semibold mb-6 mx-auto uppercase text-center">{{ __('Students of ' . 'sección ' . $class->name . ' - ' . $class->grade->name ) }}</h2>

                    <ul class="bg-white shadow-lg overflow-hidden sm:rounded-md  mx-auto mt-16">
                        @foreach($classStudents as $classStudent)
                            <li class="border-b border-gray-200">
                                <div class="px-4 py-5 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg leading-6 font-normal text-gray-900">{{ $classStudent->student }}</h3>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        @if($classStudent->status == 'ACTIVO')
                                            <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">{{ $classStudent->status }}</span></p>
                                        @else
                                            <p class="text-sm font-medium text-gray-500">Status: <span class="text-red-600">{{ $classStudent->status }}</span></p>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                        <a href="{{ route('class-students.index') }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
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
</x-app-layout>
