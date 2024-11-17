<x-base-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List Posts
        </h2>
    </x-slot>


    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6">
        @forelse($posts as $post)
            <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $post }}</p>
        @empty
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">No Posts</h1>
        @endforelse
    </div>
</x-base-layout>