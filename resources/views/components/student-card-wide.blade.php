        <tbody>
            <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-700 border-b border-default-medium dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-800 dark:text-gray-100 whitespace-nowrap hover:underline">
                        <a href="{{ route('students.show', $student) }}">
                            {{ $student->name }}
                        </a>
                    </th>
                <td class="px-4 py-3 text-gray-700 dark:text-gray-200">
                    {{ $student->grade }}
                </td>
                <td class="px-4 py-3 text-gray-700 dark:text-gray-200">
                    {{ $teachers->where('id', $student->teacher_id)->first()->name }} {{ $teachers->where('id', $student->teacher_id)->first()->surname }}
                </td>
                <td class="px-4 py-3 text-gray-700 dark:text-gray-200">
                    {{ $student->interests }}
                </td>
                <td class="flex items-center px-4 py-3">
                    <a href="{{ route('students.edit', $student) }}" class="font-medium text-fg-brand hover:underline mr-3">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-700 font-semibold transition"
                            onclick="return confirm('Delete this student?')">Delete</button>
                </form>
                </td>
            </tr>
        </tbody>
