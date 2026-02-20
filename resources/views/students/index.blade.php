<x-app-layout>
<x-slot name="header">
            <h1 class="text-4xl font-bold mb-4 text-blue-900 dark:text-blue-300">Your Student Registration Dashboard</h1>
            <p class="text-lg text-blue-900 dark:text-blue-200 font-medium">Organize, create, and manage your students</p>
            <br>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student List') }}
            <br>
            <br>
                <p class="dark:text-gray-300">There is a total of {{ $students->count() }} {{ Str::plural('student', $students->count()) }}.</p>
        </h2>
</x-slot>
<div class="container mx-auto px-4 max-w-6xl">
            <div class="mt-8 flex gap-4 flex-wrap">
                <a href="{{ route('students.create') }}"
                   class="bg-blue-500 dark:bg-blue-600 text-white px-6 py-3 rounded-lg font-bold
                          hover:bg-blue-600 dark:hover:bg-blue-500 transition shadow-lg">
                    + New Student
                </a>
            </div>

    <main class="container mx-auto px-4 max-w-6xl py-12">
        <section class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-950 dark:text-white">Students</h2>
            </div>
            <form class="mb-4" id="filterForm">
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xs border border-default dark:border-gray-700 p-2">
                        <div class="flex items-center gap-2 flex-wrap">
                            <div class="flex gap-2 flex-1 flex-wrap items-center">
                                <!-- Name search -->
                                <div class="flex items-center flex-1 min-w-[160px] bg-transparent">
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ request('name') }}"
                                        placeholder="Search by name"
                                        class="w-full bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 text-sm px-3 py-2 rounded-lg border border-default dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-500 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition"
                                    />
                                </div>

                                <!-- Grade dropdown -->
                                <div class="min-w-[120px]">
                                    <select
                                        name="grade"
                                        class="w-full bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 text-sm px-3 py-2 rounded-lg border border-default dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-500 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition">
                                        <option value="">Grade</option>
                                        <option value="1" {{ request('grade') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('grade') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('grade') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('grade') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('grade') == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ request('grade') == '6' ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ request('grade') == '7' ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ request('grade') == '8' ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ request('grade') == '9' ? 'selected' : '' }}>9</option>
                                        <option value="10" {{ request('grade') == '10' ? 'selected' : '' }}>10</option>
                                        <option value="11" {{ request('grade') == '11' ? 'selected' : '' }}>11</option>
                                        <option value="12" {{ request('grade') == '12' ? 'selected' : '' }}>12</option>
                                    </select>
                                </div>

                                <!-- Teacher dropdown -->
                                <div class="min-w-[150px]">
                                    <select
                                        name="teacher_id"
                                        class="w-full bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 text-sm px-3 py-2 rounded-lg border border-default dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-500 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition">
                                        <option value="">Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }} {{ $teacher->surname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex gap-2 items-center shrink-0">
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center bg-blue-500 dark:bg-blue-600 text-white px-3 py-1.5 text-sm font-semibold rounded-lg hover:bg-blue-600 dark:hover:bg-blue-500 transition shadow-sm">
                                    Search
                                </button>

                                @if(request('name') || request('grade') || request('teacher_id'))
                                    <a href="{{ route('students.index') }}"
                                    class="inline-flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-3 py-1.5 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition shadow-sm">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                document.getElementById('filterForm').addEventListener('submit', function(e) {
                // Get all form inputs
                const inputs = this.querySelectorAll('input[name], select[name]');

                // Remove empty inputs before submission
                inputs.forEach(input => {
                    if (!input.value || input.value === '') {
                        input.removeAttribute('name');
                    }
                });
            });
            </script>

        <div class="relative overflow-x-auto bg-white dark:bg-gray-800 shadow-xs rounded-xl border border-default dark:border-gray-700 overflow-hidden">
            <table class="w-full text-sm text-left rtl:text-right text-body dark:text-gray-300">
                <thead class="text-sm text-body bg-gray-50 dark:bg-gray-700 border-b border-default-medium dark:border-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium dark:text-gray-100">
                            Student name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium dark:text-gray-100">
                            Grade
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium dark:text-gray-100">
                            Teacher Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium dark:text-gray-100">
                            Interests
                        </th>
                        <th scope="col" class="px-6 py-3  font-medium dark:text-gray-100">
                            Action
                        </th>
                    </tr>
                </thead>
                @if($students->isEmpty())
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="5" class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                No students found.
                            </td>
                        </tr>
                    </tbody>
                @else
                @foreach($students as $student)
                    <x-student-card-wide :student="$student" :teachers="$teachers" />
                @endforeach
                @endif
            </table>
            {{ $students->links() }}
        </div>
        </section>
    </main>

</div>

</x-app-layout>
