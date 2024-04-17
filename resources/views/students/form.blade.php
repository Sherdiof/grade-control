@php
    $editing = isset($student);
@endphp

<div class="mb-4">
    <x-input-label for="name" :value="__('Nombre Completo:')" />
    <x-text-input id="name" name="name" type="text" value="{{ $editing ? old('name', $student->name) : old('name') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="age" :value="__('Edad:')" />
    <x-text-input id="age" name="age" type="number" value="{{ $editing ? old('age', $student->age) : old('age') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('age')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="birthdate" :value="__('Fecha de nacimiento:')" />
    <x-text-input type="date" name="birthdate" id="birthdate" value="{{ $editing ? old('birthdate', $student->birthdate) : old('birthdate') }}"
                  class=" w-full" />
    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="gender" :value="__('Género:')" />
    <select name="gender" id="gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
        @if($editing)
            @if($student->gender == 'M')
                <option value="M" selected>Masculino</option>
                <option value="F">Femenino</option>
            @elseif($student->gender == 'F')
                <option value="M">Masculino</option>
                <option value="F" selected>Femenino</option>
            @else
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            @endif
        @else
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        @endif
    </select>
    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="tutor" :value="__('Encargado:')" />
    <x-text-input id="tutor" name="tutor" type="text" value="{{ $editing ? old('tutor', $student->tutor) : old('tutor') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('tutor')" class="mt-2" />
</div>
<div class="mb-4">
    <x-input-label for="phone" :value="__('Teléfono:')" />
    <x-text-input id="phone" name="phone" type="text" value="{{ $editing ? old('phone', $student->phone) : old('phone') }}" class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>
@if($editing)
    <div class="mb-4">
        <x-input-label for="status" :value="__('Status:')" />
        <select name="status" id="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

            @if($student->status == 'ACTIVO')
                <option selected value="ACTIVO">ACTIVO</option>
                <option value="INACTIVO">INACTIVO</option>
            @else
                <option  value="ACTIVO">ACTIVO</option>
                <option selected value="INACTIVO">INACTIVO</option>
            @endif

        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
@endif
