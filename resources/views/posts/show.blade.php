<x-base-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show Posts
        </h2>
    </x-slot>


    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">{{ $post->title }}</h1>
        @isset($post->img_url)
            <img src="/images/{{ $post->img_url }}" alt="Post Image">
        @endisset
        <div class="text-gray-800 dark:text-gray-200 leading-tight">
            @php
                echo $post->body;
            @endphp
        </div>
    </div>
</x-base-layout>