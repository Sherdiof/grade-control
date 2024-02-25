<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments of teachers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                    <div class="flex justify-center px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="flex justify-end pb-10">
                    <a href="{{ route('assignments.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Add') }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                </div>

                <table id="example" class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __('Teacher') }}</th>
                        <th class="px-4 py-2">{{ __('Course') }}</th>
                        <th class="px-4 py-2">{{ __('Grade') }}</th>
                        <th class="px-4 py-2">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($assignments as $assignment)
                        <tr>
                            <td class="border px-4 py-2">{{ $assignment->user->name }}</td>
                            <td class="border px-4 py-2">{{ $assignment->course->name }}</td>
                            <td class="border px-4 py-2">{{ $assignment->grade->name }}</td>
                            <td class="border px-4 py-2">
                                <div>
                                    <a href="{{ route('assignments.edit', $assignment) }}" class="flex flex-row items-center text-indigo-500 hover:text-blue-800">
                                        <p class="py-2 ">Editar asignación</p>
                                        <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5">
                                              <path strokeLinecap="round" stroke-width="2" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </span>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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


        </div>
    </div>

    {{--            Alerta confirmación para eliminar un registro--}}
    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "El registro se eliminó con éxito.",
                icon: "success"
            });
        </script>
    @endif
    <script>

        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Está seguro?",
                text: "El registro se eliminará de manera permanente!",
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

</x-app-layout>
