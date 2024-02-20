<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User / Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
                    <div class="flex justify-center mt-5 mb-2">
                    <img src="{{ asset('images/avatar.png') }}" alt="detail-student" class="h-20 w-20 flex justify-center">
                    </div>
                    <h2 class="text-2xl font-semibold mb-6 mx-auto text-center">Datos de estudiante</h2>
                </div>
                <div class="px-6 mb-8 mx-72 text-black">
                    <div class="border p-4 mb-8 rounded-md border-indigo-400 shadow">
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Nombre completo de estudiante: &nbsp; </h6>
                            <p>{{ $student->name }}</p>
                        </div>
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Edad: &nbsp; </h6>
                            <p>{{ $student->age }} años</p>
                        </div>
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Fecha de cumpleaños: &nbsp; </h6>
                            <p>{{ \Carbon\Carbon::parse($student->birthdate)->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Género: &nbsp; </h6>
                            @if($student->gender == 'M')
                                <p>Masculino</p>
                            @else
                                <p>Femenino</p>
                            @endif
                        </div>
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Encargado: &nbsp; </h6>
                            <p>{{ $student->tutor }}</p>
                        </div>
                        <div class="flex">
                            <h6 class="text-gray-900 font-bold">Teléfono: &nbsp; </h6>
                            <p>{{ $student->phone }}</p>
                        </div>
                    </div>

                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                        <a href="{{ route('students.index') }}" class="w-full flex items-center justify-center border-indigo-500 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                            <span>{{ __('Go back') }}</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
