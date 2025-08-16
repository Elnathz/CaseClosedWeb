@push('style')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
<div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Post</h3>

    </div>

    <form action="/dashboard/{{ $post->slug }}" method="POST" id="post-form">
        @csrf
        @method('PATCH')
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="title" id="title"
                    class="@error('title')
                        bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                    @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Type title post" autofocus value="{{ old('title') ?? $post->title }}">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div><label for="category_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>

                <select id="category" name="category_id"
                    class="@error('category_id')
                        bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                    @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="">Select post category</option>
                    @foreach (App\Models\Category::get() as $category)
                        <option value="{{ $category->id }}" @selected((old('category_id') ?? $post->category->id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="content" rows="4" name="content"
                    class="hidden @error('content')
                            bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500
                        @enderror 
                        block w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write your content here"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div id="editor" class="sm:col-span-2 rounded-b-xl">{!! old('content', $post->content) !!}</div>
            @error('content')
                <p class="my-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-4">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <img class="mr-1 -ml-1 w-6 h-6" src="https://img.icons8.com/parakeet-line/48/pencil.png"
                    alt="pencil--v1" />
                Update post
            </button>

            <a href="/dashboard"
                class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                Cancel
            </a>
        </div>
    </form>
</div>
@push('script')
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your content here',
        });

        const postForm = document.querySelector('#post-form');
        const bodyContent = document.querySelector('#content');
        const quillEditor = document.querySelector('#editor');

        postForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Stop form submit
            let content = quillEditor.children[0].innerHTML; // Ambil isi editor
            console.log(content);

            // Cek kalau hanya "<p><br></p>" atau kosong
            if (content === '<p><br></p>') {
                quill.setContents([]); // Reset editor jadi kosong
                content = ''; // Pastikan variabel juga kosong
            }
            bodyContent.value = content;

            postForm.submit();
        });
    </script>
@endpush
