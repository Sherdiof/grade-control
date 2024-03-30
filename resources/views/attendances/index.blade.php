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
                            <div
                                class="flex justify-center px-4 items-center py-2 mr-2 text-sm text-green-800 rounded-lg bg-green-50 w-full"
                                role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex flex-wrap -mx-3">
                    <div class="px-3 mx-auto w-11/12 bg-white rounded-xl">
                        <div class="sm:flex items-stretch justify-between grow lg:mb-0  py-5 px-5">
                            <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">
                                <span
                                    class="my-0 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                                     {{ __('Grades') }}
                                </span>
                            </div>

                            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">

                                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                                        <span class="absolute ml-4 leading-none -translate-y-1/2 top-1/2 text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                        </span>
                                    <form action="{{ route('attendance.index') }}" method="get">
                                        @csrf
                                        <input name="search"
                                               class="block w-full min-w-[70px] py-3 pl-12 pr-4 text-base font-medium leading-normal bg-white border border-solid outline-none appearance-none placeholder:text-secondary-dark peer text-stone-500 border-stone-200 bg-clip-padding rounded-2xl"
                                               placeholder="Search grade..." type="text">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
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

                        @foreach($grades as $grade)
                            <div class="flex items-center justify-between border-b border-t mb-5">
                                <div class="p-3 text-gray-700 text-lg uppercase">{{ $grade->name }}</div>
                                <div class="p-3 flex">
                                    <a href="{{ route('attendance.grade', $grade->id) }}"
                                       class="text-indigo-500 hover:text-indigo-700 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-5 py-4 inline-flex space-x-1 items-center">
                                        <span>
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </span>
                                        <span>Ver secciones</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="my-10 mx-5">
                    {{$grades->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


