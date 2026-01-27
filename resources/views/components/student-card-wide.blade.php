        <tbody>
            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap hover:underline">
                        <a href="{{ route('students.show', $student) }}">
                            {{ $student->name }}
                        </a>
                    </th>
                <td class="px-6 py-4">
                    {{ $student->grade }}
                </td>
                <td class="px-6 py-4">
                    {{ $teachers->where('id', $student->teacher_id)->first()->name }} {{ $teachers->where('id', $student->teacher_id)->first()->surname }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->interests }}
                </td>
                <td class="flex items-center px-6 py-4">
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
