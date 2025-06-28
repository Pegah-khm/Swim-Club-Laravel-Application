<header class="bg-white shadow">
    @if ($home || $about || $contact)
        <img src="{{ Vite::asset('resources/images/swimming.jpg') }}" alt="Swimming" style="width: 100%; height: auto;">
    @endif
    <div class="mx-auto max-w-7xl py-5 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-blue-900">{{ $heading }}</h1>
    </div>
</header>
