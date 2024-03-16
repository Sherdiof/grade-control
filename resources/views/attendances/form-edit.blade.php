<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                {{ __('Student') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('Attendance') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $attendance->student->name }}
                </th>
                <td class="px-6 py-4">
                    <select id="assist" name="assist[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if($attendance->attendance_class == "Didn't Assist")
                            <option selected value="Didn't Assist">Didn't Assist</option>
                            <option value="Assist">Assist</option>
                        @elseif($attendance->attendance_class == "Assist")
                            <option value="Didn't Assist">Didn't Assist</option>
                            <option selected value="Assist">Assist</option>
                        @else
                            <option value="Didn't Assist">Didn't Assist</option>
                            <option value="Assist">Assist</option>
                        @endif
                    </select>
                    <input type="hidden" value="{{ $attendance->id }}" name="attendance_id[]">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
