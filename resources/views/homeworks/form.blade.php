@php
    $edit = isset($homework);
@endphp

<div class="p-2 w-full">
    <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">{{ __('Homework name') }}</label>
        <input type="text" id="name" name="name" value="{{ $edit ? old('name', $homework->name) : old('name') }}"
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('name')
        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="p-2 w-full">
    <div class="relative">
        <label for="value" class="leading-7 text-sm text-gray-600">{{ __('Value') }}</label>
        <input type="number" id="value" name="value" value="{{ $edit ? old('value', $homework->value) : old('value') }}"
               class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('value')
        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="p-2 w-full">
    <div class="relative">
        <label for="description" class="leading-7 text-sm text-gray-600">{{ __('Description') }}</label>
        <textarea id="description" name="description"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                  >{{ $edit ? old('description', $homework->description) : old('description') }}
        </textarea>
        @error('description')
        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="p-2 w-full">
    <div class="relative">
        <label for="period_id" class="leading-7 text-sm text-gray-600">{{ __('Period') }}</label>
        <select id="period_id" name="period_id" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            @foreach($periods as $period)
                @if($edit)
                    @if($period->id == $homework->period_id)
                        <option selected value="{{ $homework->period_id }}">{{ $homework->period->name }}</option>
                    @else
                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endif
                @else
                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                @endif
            @endforeach
        </select>
        @error('period_id')
        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="p-2 w-full">
    <div class="relative">
        <label for="assigment_id" class="leading-7 text-sm text-gray-600">{{ __('Course') }}</label>
        <select id="assigment_id" name="assigment_id" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            @foreach($courses as $course)
                @if($edit)
                    @if($course->id == $homework->assigment->course->id)
                        <option selected value="{{ $homework->assigment_id }}">{{ $homework->assigment->course->name }}</option>
                    @else
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endif
                @else
                    <option value="{{ $course->id }}">{{ $course->course->name }}</option>
                @endif
            @endforeach
        </select>
        @error('course_id')
        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
        @enderror
    </div>
</div>
