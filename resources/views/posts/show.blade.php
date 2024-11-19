<x-base-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-fit">
                Show Posts
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
