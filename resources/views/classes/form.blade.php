@php
    $edit = isset($class);
@endphp


<div class="mb-4">
    <x-input-label for="name" :value="__('Name:')" />
    <x-text-input id="name" name="name" type="text" value="{{ $edit ? old('name', $class->name) : old('name') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="grade_id" :value="__('Grade:')" />
    <select name="grade_id" id="grade_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        @foreach($grades as $grade)
            @if($edit)
                @if($grade->id == $class->grade_id)
                    <option selected value="{{ $class->grade_id }}">{{ $class->grade->name }}</option>
                @else
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endif
            @else
                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
            @endif
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('grade_id')" class="mt-2" />
</div>
