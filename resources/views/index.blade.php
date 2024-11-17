<x-base-layout>
    <x-slot name="title">Homepage</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Homepage
        </h2>
    </x-slot>

    @push('scripts')
        @vite('resources/js/tinymce.js')
    @endpush
    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6">
    </div>
</x-base-layout>