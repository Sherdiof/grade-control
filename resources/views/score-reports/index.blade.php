<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="m-6">
                    <div class="flex flex-wrap -mx-6">
                        @foreach($classes as $class)
                        <div class="w-full px-6 my-4 sm:w-1/2 xl:w-1/3">
                            <div class="flex h-full items-center px-5 py-6 shadow-sm shadow-violet-600 rounded-md bg-violet-200">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                    <svg class="w-8 h-8 text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>

                                <div class="mx-5">
                                    <h4 class="text-xl font-semibold text-gray-700">{{ $class->grade }} - {{ $class->class }}</h4>
                                    <a href="{{ $class->class_id }}" class="text-gray-500">Ver calificaciones</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
