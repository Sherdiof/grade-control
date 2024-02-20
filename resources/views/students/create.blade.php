<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Students / Create') }}
            </h2>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
                    <h2 class="text-2xl font-semibold mb-6 mx-auto text-center">Agregar Estudiante</h2>

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        @include('students.form')

                        <div class="flex justify-around">
                            <a href="{{ route('students.index') }}" class="flex items-center bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                Regresar
                            </a>
                            <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
