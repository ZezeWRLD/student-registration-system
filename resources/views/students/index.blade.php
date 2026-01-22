<x-app-layout>
<x-slot name="header">
            <h1 class="text-4xl font-bold mb-4 text-blue-900">Your Student Registration Dashboard</h1>
            <p class="text-lg text-blue-900 font-medium">Organize, create, and manage your students</p>
            <br>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student List') }}
            <br>
            <br>
                <p>There is a total of {{ $students->count() }} {{ Str::plural('student', $students->count()) }}.</p>
        </h2>
</x-slot>
<div class="container mx-auto px-4 max-w-6xl">
            <div class="mt-8 flex gap-4 flex-wrap">
                <a href="{{ route('students.create') }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded-lg font-bold
                          hover:bg-blue-600 transition shadow-lg">
                    + New Student
                </a>
            </div>

    <main class="container mx-auto px-4 max-w-6xl py-12">
        <section class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-950">Students</h2>
            </div>


        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Student name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Grade
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Teacher Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Interests
                        </th>
                        <th scope="col" class="px-6 py-3  font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                @foreach($students as $student)
                    <x-student-card-wide :student="$student" />
                @endforeach
            </table>
        </div>
        </section>
    </main>

</div>

</x-app-layout>
