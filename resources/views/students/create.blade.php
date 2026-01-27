<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Back Button -->
                    <div class="mb-6">
                        <a href="{{ route('students.index') }}"
                           class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Students
                        </a>
                    </div>

                    <!-- Create Form -->
                    <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('POST')

                    <div class="space-y-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name:<span class="text-red-500 ml-1">*</span></label>
                    <input type="text" id="name" name="name" placeholder="Enter name..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required minlength="3" />
                    </div>

                    <div class="space-y-1">
                    <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Grade<span class="text-red-500 ml-1">*</span></label>
                    <input type="number" id="grade" name="grade" placeholder="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required min="1" max="12" />
                    </div>

                    <div class="space-y-1">
                    <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name of Teacher :<span class="text-red-500 ml-1">*</span></label>
                    <select id="teacher_id" name="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        <option value="" disabled selected>Select a teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="space-y-1">
                    <label for="interests" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Student Interests: <span class="text-red-500 ml-1">*</span></label>
                    <textarea id="interests" name="interests" placeholder="List student interests..." rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required></textarea>
                    </div>

                    <div>
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 dark:bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 dark:hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800">Add Student</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
