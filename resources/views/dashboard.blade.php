<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}<br><br>
                    <a href="/sharepost/{{ Auth::user()->id }}" class="text-gray-900 dark:text-gray-100 sm:rounded-lg" style="background: rgb(154, 109, 245); font-size: 20px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">Create Post</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
