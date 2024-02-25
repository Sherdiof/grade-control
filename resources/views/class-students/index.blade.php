<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="flex w-full">
                    <div class="flex justify-end  pb-10 w-full">
                        @if(session('status'))
                            <div class="flex justify-center px-4 items-center py-2 mr-2 text-sm text-green-800 rounded-lg bg-green-50 w-full" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('class-students.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Add') }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>{{ __('Name Class') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classStudents as $classStudent)
                        <tr>
                            <td class="uppercase">{{ $classStudent->class_grade }}</td>
                            <td>{{ $classStudent->qty }} Students</td>
                            <td>
                                <div>
                                    <a href="{{ route('class-students.edit', $classStudent->class_id) }}" class="flex flex-row items-center text-indigo-500 hover:text-blue-800">
                                        <p class="py-2 ">Agregar estudiantes</p>
                                        <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                            </svg>
                                        </span>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>

        @if(session('eliminar') == 'ok')
        Swal.fire({
            title: "¡Eliminado!",
            text: "El usuario se eliminó con éxito.",
            icon: "success"
        });
        @endif


        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Está seguro?",
                text: "El usuario se eliminará de manera permanente!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            });
        });
    </script>

    <style>
        /* Add your custom styles here */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #9195F6; /* Cambia a tu color morado */
            color: #fff;
            padding: 0.5rem 1rem; /* Ajusta segÃºn sea necesario */
            border-radius: 9999px; /* Hace que los botones sean redondos */
            margin-right: 0.5rem; /* Espaciado entre los botones */
            margin-top: 1.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #6c4ca9; /* Cambia a tu color morado oscuro */
        }

        /* Add your custom styles here */
        .dataTables_info {
            margin-top: 1.5rem /* Ajusta el tamaño de fuente según sea necesario */
        }
    </style>

</x-app-layout>
