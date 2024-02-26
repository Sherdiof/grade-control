@php
    $edit = isset($classStudents);
@endphp
@if ($errors->any())
    <div class="mx-auto w-full  items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        @foreach ($errors->all() as $error)
            <div class="flex items-center my-1">
                <svg class=" flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Alerta!</span> {{ $error }}
                </div>
            </div>
        @endforeach
    </div>
@endif

@if($edit)
    <div class="max-w-3xl mx-auto mt-8 mb-6 space-y-4 md:mt-8">
        <div
            class="transition-all duration-200 bg-white border border-gray-200 shadow cursor-pointer hover:bg-gray-50">
            <button type="button" id="question1" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                <span class="flex uppercase text-lg font-semibold text-black">sección {{ $class->name }} - {{ $class->grade->name }}</span>
                <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="w-6 h-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="answer1" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                <p>Estudiantes:</p>
                <ul class="ml-2">
                    @foreach($classStudents as $classStudent)
                        <li>{{ $classStudent->student }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
<div class="mb-4">
    <x-input-label for="grade_id" :value="__('Grade:')" />
    <select name="class_id" id="class_id" class="uppercase border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        @if($edit)
            <option value="{{ $class->id }}">{{ 'sección ' . $class->name . ' - ' . $class->grade->name }}</option>
        @else
            @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ 'sección ' . $class->name . ' - ' . $class->grade->name }}</option>
            @endforeach
        @endif
    </select>
    <x-input-error :messages="$errors->get('grade_id')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="student_id" :value="__('Students:')" />
    <select name="student_id[]" multiple="multiple" id="student_id" class="uppercase border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        @foreach($students as $student)
            <option {{ in_array($student->id, old('student_id') ?? []) ? 'selected' : '' }} value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>

</div>
