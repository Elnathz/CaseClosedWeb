<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8 mx-auto flex gap-5">
            <a href="/posts" class="hover:text-blue-700 transition duration-300 ease-in-out">&laquo; Back</a>
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight ">
                Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <x-posts.table :posts="$posts" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
