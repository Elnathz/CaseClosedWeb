<x-layout :title="$title">
    <a href="/posts" class="text-blue-400 hover:text-blue-600 hover:underline">&laquo; Kembali</a>
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="font-bold text-gray-900 hover:underline decoration-2">
                <h2 class="mb-1 text-3xl tracking-tight">{{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                <p> By <a href="/authors/{{ $post->author->username }}"
                        class=" text-gray-900 hover:underline">{{ $post->author->name }}</a> in
                    {{ $post->category->name }} | {{ $post['created_at'] }} </p>
            </div>
            <p class="text-justify my-3 font-light">
                {{ Str::limit($post['content'], 100) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}"
                class="font-medium text-blue-400 hover:text-blue-700 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
