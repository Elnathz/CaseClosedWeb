<x-layout :title="$title">
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500">
                <a href="">{{ $post['author'] }}</a> | {{ $post['date'] }}
            </div>
            <p class="text-justify my-3 font-light">
                {{ Str::limit($post['content'], 150) }}
            </p>
            <a href="" class="font-medium text-blue-400 hover:text-blue-700 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
