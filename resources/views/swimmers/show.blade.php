<x-layout>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            @php
                $dob = Carbon\Carbon::parse($swimmer->dob);
                $age = $dob->age;
            @endphp

            <h1 class="text-2xl font-bold text-blue-900 mb-5">
                {{ $swimmer->forename }}'s Information:
            </h1>

            <div class="swimmer-container">
                <div class="float-right mb-4">
                    <img src="{{ Vite::asset('resources/images/personIcon3.jpg') }}" alt="Swimmer Photo"
                         class="h-40 w-35 object-cover">
                </div>

                <div>
                    <label><strong>Full Name:</strong></label>
                    <span>{{ $swimmer->forename }} {{ $swimmer->surname }}</span>
                </div>
                <div>
                    <label><strong>Email:</strong></label>
                    <span>{{ $swimmer->email }}</span>
                </div>
                <div>
                    <label><strong>Age:</strong></label>
                    <span>{{ $age }}</span>
                </div>
                <div>
                    <label><strong>Squad Name:</strong></label>
                    <span>{{ $squad->name ?? 'n/a' }}</span>
                </div>

                <div>
                    <label><strong>Coach Name:</strong></label>
                    <span>{{ $coach->forename ?? '' }} {{ $coach->surname ?? '' }}</span>
                </div>

                <div class="mt-10">
                    <h2 class="text-xl font-bold text-blue-800 mb-4">Swim Performance Data:</h2>

                    <table class="w-full table-auto border">
                        <thead>
                        <tr class="bg-blue-100 text-left">
                            <th class="p-2">Date</th>
                            <th class="p-2">Event</th>
                            <th class="p-2">Time</th>
                            <th class="p-2">Distance</th>
                            <th class="p-2">Strokes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($performance as $item)
                            <tr class="border-t">
                                <td class="p-2">{{ $item->performance_date }}</td>
                                <td class="p-2">{{ $item->event }}</td>
                                <td class="p-2">{{ $item->time }}</td>
                                <td class="p-2">{{ $item->distance }}</td>
                                <td class="p-2">{{ $item->stroke }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-2 text-center text-gray-500">No performance data available.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <a href="{{ route('swimmers.index') }}" class="button">Back to Swimmers List</a>
                </div>

            </div>
        </div>
    </main>
</x-layout>
