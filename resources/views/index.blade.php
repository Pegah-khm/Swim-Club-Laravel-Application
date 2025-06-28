@props(['heading'])

@php
    $heading = Auth::check() ? 'Dashboard' : 'Welcome to PK Swimming Club';
@endphp

<x-layout :heading="$heading" :home="true">

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div class="mb-6">
                <p class="text-xl font-semibold text-gray-900">
                    Hello, <span class="text-blue-700">
                    {{ Auth::check() ? Auth::user()->forename : 'Guest' }}
                </span>. You are on the Home Page.
                </p>
            </div>

            @guest
                <div class="border-l-4 bg-blue-50 text-blue-800 px-4 py-3 rounded-md mb-6">
                    <p class="font-medium">Note:</p>
                    <p class="text-base leading-relaxed">
                        Only members have access to the full content of the pages.
                        <br>
                        Click the buttons below to see the opening hours and membership information, or please log in or sign up.
                    </p>

                    <div class="mt-4 space-x-4">
                        <a href="/timetable" class="inline-block px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-700">TimeTable</a>
                        <a href="/membership" class="inline-block px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-700">Membership</a>
                    </div>
                </div>
            @endguest

            @auth
                @php $role = Auth::user()->role ?? 'guest'; @endphp

                <ul class="flex flex-wrap gap-6 mt-6">
                    @if ($role === 'club_official')
                        <li><a href="/swimmers" class="menu-button">Swimmers</a></li>
                        <li><a href="/squads" class="menu-button">Swim Teams</a></li>
                        <li><a href="/coaches" class="menu-button">Coaches</a></li>
                        <li><a href="/events" class="menu-button">Events and meets</a></li>

                    @elseif ($role === 'coach')
                        <li><a href="/swimmers" class="menu-button">Swimmers</a></li>
                        <li><a href="/squads" class="menu-button">Swim Teams</a></li>
                        <li><a href="/events" class="menu-button">Events and meets</a></li>

                    @elseif (in_array($role, ['swimmer', 'parent']))
                        <li><a href="/events" class="menu-button">Events and meets</a></li>
                        <li><a href="/squads" class="menu-button">Swim Teams</a></li>
                    @endif
                </ul>
            @endauth

        </div>
    </main>

</x-layout>
