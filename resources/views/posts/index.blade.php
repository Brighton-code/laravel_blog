<x-base-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-fit">
                List Posts
            </h2>
            @auth
                <div class="space-x-8 -my-px ms-8 flex">
                    <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                        Create
                    </x-nav-link>
                </div>
            @endauth
        </div>
    </x-slot>


    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="@if($post->img_url) /images/{{ $post->img_url }} @endif" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Image</a>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}" class="ms-auto font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="" onclick="this.closest('form').submit(); return 0;" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th colspan="4" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No posts
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>