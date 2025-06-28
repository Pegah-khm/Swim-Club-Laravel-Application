<x-layout>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            @php
                $dob = \Carbon\Carbon::parse($coach->dob);
                $age = $dob->age;
            @endphp

            <h1 class="text-2xl font-bold text-blue-900 mb-5">
                {{ $coach->forename }}'s Profile
            </h1>

            <div class="swimmer-container w-full max-w-4xl bg-white shadow-md rounded p-6">
                <div>
                    <label><strong>Full Name:</strong></label>
                    <span>{{ $coach->forename }} {{ $coach->surname }}</span>
                </div>

                <div>
                    <label><strong>Email:</strong></label>
                    <span>{{ $coach->email }}</span>
                </div>

                <div>
                    <label><strong>Age:</strong></label>
                    <span>{{ $age }}</span>
                </div>

                <div>
                    <label><strong>Phone:</strong></label>
                    <span>{{ $coach->phone }}</span>
                </div>

                <div>
                    <label><strong>Address:</strong></label>
                    <span>{{ $coach->address }}, {{ $coach->postcode }}</span>
                </div>

                <div>
                    <label><strong>Squad:</strong></label>
                    <span>{{ $coach->squad->name ?? 'n/a' }}</span>
                </div>

                <div class="mt-6">
                    <a href="{{ route('coaches.index') }}" class="button">Back to Coaches List</a>
                </div>

            </div>
        </div>
    </main>
</x-layout>
