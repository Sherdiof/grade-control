<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
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
                    <div class="flex justify-end">
                        <a href="{{ route('students.index') }}" class="items-center bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                            Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
