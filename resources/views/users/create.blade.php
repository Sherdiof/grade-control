<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User / Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Create form') }}</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ __('Enter the requested data') }}</p>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">{{ __('Name') }}</label>
                                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('name')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="phone" class="leading-7 text-sm text-gray-600">{{ __('Phone  (Opcional)') }}</label>
                                            <input type="text" id="phone" name="phone" value="{{old('phone')}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('phone')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="email" class="leading-7 text-sm text-gray-600">{{ __('Email') }}</label>
                                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('email')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="password" class="leading-7 text-sm text-gray-600">{{ __('Password') }}</label>
                                            <input type="password" id="password" name="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('password')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="area" class="leading-7 text-sm text-gray-600">{{ __('Work area  (Opcional)') }}</label>
                                            <input type="text" id="area" name="area" value="{{old('area')}}"
                                                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @error('area')
                                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="role" class="leading-7 text-sm text-gray-600">{{ __('Role') }}</label>
                                            <select id="role" name="role" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                <option selected>Open this select menu</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Docente">Docente</option>
                                            </select>                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-1 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send  </button>
                                    </div>
                                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                        <a href="{{ route('users.index') }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
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
