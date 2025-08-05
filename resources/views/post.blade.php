<x-layout :title="$title">
    <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            By <a href="/authors/{{ $post->author->username }}"
                class=" text-gray-900 hover:underline">{{ $post->author->name }}</a> in <a
                href="/categories/{{ $post->category->slug }}"
                class=" text-gray-900 hover:underline">{{ $post->category->name }}</a> | {{ $post['created_at'] }}
        </div>
        <p class="text-justify my-3 font-light">
            {{ $post['content'] }}
        </p>
        <a href="/posts" class="font-medium text-blue-400 hover:text-blue-700 hover:underline">&laquo; Go back</a>
    </article>
</x-layout>
