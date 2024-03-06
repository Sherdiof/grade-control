<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeworks / Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section class="text-gray-600 body-font relative">
                    <div class="px-5 py-24 mx-auto">
                        <form action="{{ route('homeworks.show', $homework) }}" method="POST">
                            @csrf
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                        <div class="px-4 py-2 sm:px-6">
                                            <h3 class="text-2xl leading-6 font-medium text-gray-900">
                                                {{ __('Detail of homework') }}
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-xl text-gray-500">
                                                {{ $homework->name }}
                                            </p>
                                        </div>
                                        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Period') }}
                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->period->name }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Course') }}                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->assigment->course->name }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Task score') }}                                                    </dt>
                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->value }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Grade') }}
                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->assigment->grade->name }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Teacher') }}
                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->assigment->user->name }}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-md font-medium text-gray-500">
                                                        {{ __('Description') }}
                                                    </dt>
                                                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $homework->description }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>

                                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                        <a href="{{ route('homeworks.index') }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
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
