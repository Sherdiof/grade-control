<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add') }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
                </div>

                 <table id="example" class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Name') }}</th>
                            <th class="px-4 py-2">{{ __('Email') }}</th>
                            <th class="px-4 py-2">{{ __('Phone') }}</th>
                            <th class="px-4 py-2">{{ __('Area') }}</th>
                            <th class="px-4 py-2">{{ __('Rol') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->phone }}</td>
                            <td class="border px-4 py-2">{{ $user->area }}</td>
                            <td class="border px-4 py-2">{{ $user->role }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex flex-row">
                                    <a href="{{ route('users.edit', $user) }}">
                                        <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                          <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                          </svg>
                                        </span>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{route('users.destroy', $user)}}" class="formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="relative align-middle px-2 select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 text-red-600">
                                                <path strokeLinecap="round" strokeLinejoin="round" stroke-width="1.5" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
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
