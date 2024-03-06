<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                <div class="flex w-full">
                    <div class="flex justify-end  pb-10 w-full">
                            <div class="flex justify-center px-4 items-center py-2 mr-2 text-sm text-green-800 rounded-lg bg-green-50 w-full" role="alert">
                                {{ session('status') }}
                            </div>
                    </div>
                </div>
                @endif

                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="px-3 mb-6  mx-auto w-11/12 bg-white rounded-xl">
                        <div class="sm:flex items-stretch justify-between grow lg:mb-0  py-5 px-5">
                            <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">
                                <span class="my-0 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                                     {{ __('Grades') }}
                                </span>
                            </div>

                            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">

                                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                                        <span class="absolute ml-4 leading-none -translate-y-1/2 top-1/2 text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                        </span>
                                    <form action="{{ route('attendance.index') }}" method="get">
                                        @csrf
                                        <input name="search" class="block w-full min-w-[70px] py-3 pl-12 pr-4 text-base font-medium leading-normal bg-white border border-solid outline-none appearance-none placeholder:text-secondary-dark peer text-stone-500 border-stone-200 bg-clip-padding rounded-2xl" placeholder="Search grade..." type="text">
                                    </form>
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

                        @foreach($classStudents as $classStudent)
                            <div class="flex items-center justify-between border-b mb-5">
                                <div class="p-3 text-gray-700 text-lg uppercase">{{ $classStudent->nameGrade }}</div>
                                <div class="p-3 flex">
                                    <a href="{{ route('attendance.register', $classStudent->class_id) }}" class="text-indigo-500 hover:text-indigo-800 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    </span>
                                        <span>Tomar asistencia</span>
                                    </a>
                                    <a href="{{ route('courses.edit', $classStudent->class_id) }}" class="text-red-500 hover:text-red-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </span>
                                        <span>Editar asistencia</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="my-10 mx-5">
                    {{$classStudents->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


