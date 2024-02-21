<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
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
                                        <form action="{{ route('courses.index') }}" method="get">
                                            @csrf
                                        <input name="search" class="block w-full min-w-[70px] py-3 pl-12 pr-4 text-base font-medium leading-normal bg-white border border-solid outline-none appearance-none placeholder:text-secondary-dark peer text-stone-500 border-stone-200 bg-clip-padding rounded-2xl" placeholder="Search..." type="text">
                                        </form>
                                        <span onclick="(() => { this.previousElementSibling.value=''})()" class="absolute right-0 left-auto mr-4 leading-none -translate-y-1/2 peer-placeholder-shown:hidden top-1/2 hover:text-primary text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        </span>
                                    </div>
                                    <div class="flex justify-end ml-10">
                                        <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-3 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Add') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-2">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
                    <div class="container mx-auto">
                        <!-- Card -->
                        <div class="h-50 w-full rounded-lg bg-white mb-10 ">
                            <!-- Header -->
                            <div class="p-3 text-lg text-gray-600 font-bold">
                                {{ __('Name') }}
                            </div>

                            @foreach($courses as $course)
                            <div class="flex items-center justify-between border-b mb-5">
                                <div class="p-3 text-gray-700 text-lg">{{ $course->name }}</div>
                                <div class="p-3 flex">
                                    <a href="{{ route('courses.edit', $course) }}" class="text-indigo-500 hover:text-indigo-800 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        </span>
                                        <span>Edit</span>
                                    </a>
                                    <form method="POST" action="{{route('courses.destroy', $course)}}" class="formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        </span>
                                        <span>Delete</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

            </div>
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
