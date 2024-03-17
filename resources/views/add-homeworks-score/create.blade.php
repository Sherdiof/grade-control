<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if(session('status'))
                    <div class="flex justify-center px-4 items-center py-2 mr-2 text-sm text-green-800 rounded-lg bg-green-50 w-full" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- component -->
                <div class="flex flex-wrap -mx-3 mb-5 mt-10">
                    <div class="px-3 mb-6  mx-auto w-11/12 bg-white rounded-xl">

                        <div class="flex flex-row flex-wrap mb-5 mr-3 lg:mb-0">

                        <span
                            class="ml-5 mb-8 my-0 flex text-dark font-semibold text-[1.35rem]/[1.2] flex-col justify-center">
                             {{ $homeworkScore->name }}

                        </span>
                        <span
                            class="ml-3 mb-8 my-0 flex text-gray-500 text-[1.1rem]/[1.2] flex-col justify-center">
                            ({{ __('Value:') }} {{ $homeworkScore->value }}pts)

                        </span>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Students') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ __('Score') }}

                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <form action="{{route('add-homeworks-score.store', ['homework_id' => $homeworkScore->id, 'assigment_id' => $homeworkScore->assigment_id])}}" method="POST">
                                    @csrf
                                    <input value="{{$homeworkScore->id}}" type="hidden" name="homework">

                                @foreach($homeworkStudents as $homeworkStudent)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-semibold text-gray-900">
                                            {{$homeworkStudent->estudiante}} - {{ __('SECTION') }} {{ $homeworkStudent->seccion }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div>
                                                    <input value="{{$homeworkStudent->student_id}}"
                                                           name="student_id[]"
                                                           type="hidden">

                                                    <input type="number" id="first_product"
                                                           name="score[]"
                                                           step="any"
                                                           class="bg-gray-50 w-16 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1"
                                                           required/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="p-2 w-full mt-10">
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-1 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send  </button>
                            </div>
                            <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                <a href="{{ route('homeworks.viewHomeworksGrades', $homeworkScore->assigment_id) }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>
                                    <span>Go back</span>
                                </a>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
