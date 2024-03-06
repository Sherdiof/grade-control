<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeworks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                    <div class="flex justify-center px-4 p-4 mb-4 mt-5 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- component -->
                <div class="flex flex-wrap -mx-3 mb-5 mt-10">
                    <div class="px-3 mb-6  mx-auto w-11/12 bg-white rounded-xl">
                        <div class="sm:flex items-stretch justify-between grow lg:mb-0  py-5 px-5">

                            <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">
                                <span class="my-0 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                                     {{ __('List of aggregates') }}

                                </span>
                            </div>

                            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">

                                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                                        <span class="absolute ml-4 leading-none -translate-y-1/2 top-1/2 text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                        </span>
                                    <form action="{{ route('homeworks.index') }}" method="GET">
                                        @csrf
                                        <input name="search" class="block w-full min-w-[70px] py-3 pl-12 pr-4 text-base font-medium leading-normal bg-white border border-solid outline-none appearance-none placeholder:text-secondary-dark peer text-stone-500 border-stone-200 bg-clip-padding rounded-2xl" placeholder="Search..." type="text">
                                    </form>
                                </div>
                                <div class="flex justify-end ml-10">
                                    <a href="{{ route('homeworks.groupHomeworksGrades') }}" class="inline-flex items-center px-4 py-3 bg-gray-50 border border-solid rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Grade homeworks') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex justify-end ml-10">
                                    <a href="{{ route('homeworks.create') }}" class="inline-flex items-center px-4 py-3 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Add') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
                    </div>
                </div>

                    <!-- component -->
                    <div class="flex items-center justify-center">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

                            @foreach($homeworks as $homework)
                            <!-- 1 card -->
                            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-5">
                                    <!-- svg  -->
                                    {{ $homework->value }}
                                    <svg class="w-3 h-3 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                    </svg>
                                </div>
                                <div class="mt-8">
                                    <p class="text-xl font-semibold my-2">{{ $homework->name }}</p>
                                    <div class="flex space-x-2 text-gray-400 text-sm">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p>{{$homework->period->name}}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <p>{{ $homework->assigment->course->name }}</p>
                                    </div>
                                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                        <!-- svg  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <p>{{ $homework->assigment->user->name }}</p>
                                    </div>
                                    <div class="border-t-2"></div>

                                    <div class="flex justify-between">
                                        <div class="my-2">
                                            <p class="font-semibold text-base">Acciones</p>
                                            <div class="flex space-x-2">
                                                <div class="flex">
                                                    <a href="{{ route('homeworks.edit', $homework) }}" class="text-indigo-500 hover:text-indigo-800 text-sm font-medium px-2 py-2 inline-flex space-x-1">
                                                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                            </span>
                                                    </a>
                                                    <form method="POST" action="{{route('homeworks.destroy', $homework)}}" class="formulario-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm rounded-r-lg font-medium px-2 py-2 inline-flex space-x-1">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <p class="font-semibold text-base mb-2">Detalle</p>
                                            <div class="text-base px-2 text-gray-400 font-semibold">
                                                <a href="{{ route('homeworks.show', $homework) }}" class="">
                                                <svg class="w-6 h-6 text-gray-800 hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.8a1.2 1.2 0 0 1-1.2 1.2H5.2A1.2 1.2 0 0 1 4 18.8V7.2A1.2 1.2 0 0 1 5.2 6h4.6m4.4-2H20v5.8m-7.9 2L20 4.2"/>
                                                </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="my-10 mx-5">
                        {{$homeworks->links()}}
                    </div>
            </div>
        </div>
    </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
