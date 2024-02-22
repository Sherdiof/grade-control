@php
    $edit = isset($grade);
@endphp

<div class="mb-4">
    <x-input-label for="name" :value="__('Name:')" />
    <x-text-input id="name" name="name" type="text" value="{{ $edit ? old('name', $grade->name) : old('name') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
