<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8 mx-auto">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
                Update Post "{{ $post->title }}"
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-posts.edit :post="$post" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
