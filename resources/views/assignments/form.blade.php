@php
    $edit = isset($assigment);
@endphp

<div class="p-2 w-full">
    <div class="relative">
        <label for="user" class="leading-7 text-sm text-gray-600">{{ __('Teacher') }}</label>
            <select id="user" name="user_id" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                @foreach($users as $user)
                    @if($edit)
                        @if($user->id == $assigment->user_id)
                            <option selected value="{{ $assigment->user_id }}">{{ $assigment->user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
    </div>
</div>
<div class="p-2 w-full">
    <div class="relative">
        <label for="grade" class="leading-7 text-sm text-gray-600">{{ __('Add a grade') }}</label>
        <select id="grade" name="grade_id[]" multiple="multiple" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            @foreach($grades as $grade)
                @if($edit)
                    @if($grade->id == $class->grade_id)
                        <option selected value="{{ $assigment->grade_id }}">{{ $assigment->grade->name }}</option>
                    @else
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endif
                    @else
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endif
            @endforeach
        </select>
    </div>
</div>
<div class="p-2 w-full">
    <div class="relative">
        <label for="course" class="leading-7 text-sm text-gray-600">{{ __('Add a course') }}</label>
        <select id="course" name="course_id[]" multiple="multiple" class="py-3 px-4 pe-9 block w-full bg-gray-100 bg-opacity-50 border border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            @foreach($courses as $course)
                @if($edit)
                    @if($course->id == $assigment->course_id)
                        <option selected value="{{ $assigment->course_id }}">{{ $assigment->course->name }}</option>
                    @else
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endif
                @else
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<input type="hidden" id="hiddenGrade" name="hiddenGrade" value="">

<!-- Input hidden para el valor de course -->
<input type="hidden" id="hiddenCourse" name="hiddenCourse" value="">






