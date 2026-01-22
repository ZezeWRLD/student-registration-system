<x-app-layout>
<x-slot name="header">
            <h1 class="text-4xl font-bold mb-4 text-blue-900">Your Student Registration Dashboard</h1>
            <p class="text-lg text-blue-900 font-medium">Organize, create, and manage your students</p>
            <br>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
</x-slot>

     <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 flex items-center justify-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-center">
                        <h3 class="text-2xl font-semibold mb-2 ">Welcome back, {{ Auth::user()->name }}!</h3>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('students.create') }}"
                           class="inline-flex items-center px-8 py-4 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create New Student
                        </a>
                        <a href="{{ route('students.index') }}"
                           class="ml-3 inline-flex items-center px-8 py-4 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            View All Students
                        </a>
                    </div>
                </div>
            </div>

</x-app-layout>
