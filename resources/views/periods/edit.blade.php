<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periods / Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Edit form') }}</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ __('Edit the data you need') }}</p>
                        </div>
                        <form action="{{ route('periods.update', $period) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">{{ __('Period name') }}</label>
                                            <input type="text" id="name" name="name" value="{{old('name', $period->name)}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('name')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="year" class="leading-7 text-sm text-gray-600">{{ __('Year') }}</label>
                                            <input type="number" id="year" name="year" value="{{old('year', $period->year)}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('name')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="p-2 w-full mt-10">
                                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-1 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send  </button>
                                    </div>
                                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                        <a href="{{ route('periods.index') }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                                            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                            </svg>
                                            <span>Go back</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>


            </div>
        </div>
    </div>
</x-app-layout>
