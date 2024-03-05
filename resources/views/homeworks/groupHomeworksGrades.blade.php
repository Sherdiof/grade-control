<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeworks for grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <!-- component -->
                <div class="flex flex-wrap -mx-3 mb-5 mt-10">
                    <div class="px-3 mb-6  mx-auto w-11/12 bg-white rounded-xl">
                        <div class="sm:flex items-stretch justify-between grow lg:mb-0  py-5 px-5">

                            <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">
                                <span class="my-0 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                                     {{ __('Assignments added by grado') }}

                                </span>
                            </div>

                            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">

                                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                                        <span class="absolute ml-4 leading-none -translate-y-1/2 top-1/2 text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                        </span>
                                    <form action="{{ route('homeworks.groupHomeworksGrades') }}" method="GET">
                                        @csrf
                                        <input name="search" class="block w-full min-w-[70px] py-3 pl-12 pr-4 text-base font-medium leading-normal bg-white border border-solid outline-none appearance-none placeholder:text-secondary-dark peer text-stone-500 border-stone-200 bg-clip-padding rounded-2xl" placeholder="Search..." type="text">
                                    </form>
                                </div>
                                <div class="text-center ml-5">
                                    <a href="{{ route('homeworks.index') }}" class="flex items-center justify-center px-4 py-4 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg sm:w-auto hover:bg-gray-100">
                                        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                        </svg>
                                        <span>Go back</span>
                                    </a>

                                </div>
                                <div class="flex justify-end ml-5">
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

                <div class="h-full  w-full bg-transparent pt-12 p-4">
                    <div class="grid gap-14 md:grid-cols-3 md:gap-5">

                            @foreach($homeworksGrades as $homeworkGrade)
                                <div class="rounded-xl bg-white border border-b-indigo-500 p-6 text-center shadow-xl">
                                    <div
                                        class="mx-auto flex h-16 w-16 -translate-y-8 transform items-center justify-center rounded-full bg-indigo-300 shadow-lg">
                                        <svg viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                                            <path
                                                d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <h1 class="text-darken mb-5 text-xl font-medium lg:px-14">{{ $homeworkGrade->grades }}</h1>
                                    <p class="px-4 text-gray-500">Periodo: {{ $homeworkGrade->assigment_id }}</p>
                                    <p class="px-4 text-gray-500">Curso: {{ $homeworkGrade->courses }}</p>
                                    <p class="px-4 text-gray-500">Cantidad de tareas: {{ $homeworkGrade->homeworks }}</p>
                                    <a class="px-4 text-blue-500 cursor-pointer" href="{{ route('homeworks.viewHomeworksGrades', $homeworkGrade->assigment_id) }}"> Ver más</a>
                                </div>
                            @endforeach

                </div>
            </div>

                <div class="my-10 mx-5">
                    {{$homeworksGrades->links()}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
