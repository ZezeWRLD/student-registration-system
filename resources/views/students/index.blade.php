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


        <div class="relative overflow-x-auto bg-neutral-primary-soft dark:bg-gray-800 shadow-xs rounded-base border border-default dark:border-gray-700">
            <table class="w-full text-sm text-left rtl:text-right text-body dark:text-gray-300">
                <thead class="text-sm text-body bg-neutral-secondary-medium dark:bg-gray-700 border-b border-default-medium dark:border-gray-600">
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
                @foreach($students as $student)
                    <x-student-card-wide :student="$student" :teachers="$teachers" />
                @endforeach
            </table>
        </div>
        </section>
    </main>

</div>

</x-app-layout>
