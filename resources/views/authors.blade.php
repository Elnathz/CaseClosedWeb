<x-layout :title="$title">
    <a href="/posts" class="text-blue-400 hover:text-blue-600 hover:underline">&laquo; Kembali</a>
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300"> 
            <a href="/posts/{{ $post['slug'] }}" class="font-bold text-gray-900 hover:underline decoration-2">
                <h2 class="mb-1 text-3xl tracking-tight">{{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                <p>{{ $post->author->name }} in <a
                href="/categories/{{ $post->category->slug }}"
                class=" text-gray-900 hover:underline">{{ $post->category->name }}</a> | {{ $post['created_at'] }} | {{ $post['created_at'] }}</p>
            </div>
            <p class="text-justify my-3 font-light">
                {{ Str::limit($post['content'], 100) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-400 hover:text-blue-700 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
