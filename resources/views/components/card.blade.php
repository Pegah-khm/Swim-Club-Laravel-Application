@props(['heading', 'message', 'backRoute' => url()->previous()])

<x-layout :heading="$heading">
    <main class="flex items-center justify-center h-[65vh] text-center px-4 bg-gray-50">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-xl w-full border border-gray-200">
            <h2 class="text-2xl sm:text-3xl font-semibold text-indigo-700 mb-4">{{ $heading }}</h2>
            <p class="text-lg text-gray-600 mb-6">{{ $message }}</p>

            <a href="{{ $backRoute }}"
               class="inline-block px-5 py-2 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition">
                Go back
            </a>
        </div>
    </main>
</x-layout>
