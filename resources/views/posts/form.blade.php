<x-base-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-fit">
                @if($post->exists) Edit @else Create @endif Posts
            </h2>
            @auth
            <div class="space-x-8 -my-px ms-8 flex">
                <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                    Create
                </x-nav-link>
                @if($post->isOwner())
                    <x-nav-link :href="route('posts.edit', $post)" :active="request()->routeIs('posts.edit', $post)">
                        Edit
                    </x-nav-link>
                @endif
            </div>
            @endauth
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="error text-red-500">{{ $error }}</div>
            @endforeach
        @endif
    </x-slot>

    @push('scripts')
        @vite('resources/js/tinymce.js')
    @endpush
    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6">
        @if($post->exists)
            <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @method('PUT')
        @else
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        @endif
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('title', $post->title) }}">
                </div>
                <div class="mb-6">
                    <label for="image" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Upload image</label>
                    <input name="image" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-600 file:dark:text-gray-200 file:hover:bg-gray-500" id="image" type="file">
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">PNG, JPG SVG, and GIF are Allowed. (MAX. 800x400px)</p>
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea class="editor" name="body">{{ old('body', $post->body) }}</textarea>
                </div>
                <div class="mb-6">
                    <button type="submit" class="px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </div>
            </form>
    </div>
</x-base-layout>
