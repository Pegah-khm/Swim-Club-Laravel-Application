@php use Carbon\Carbon; @endphp
<x-layout>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-blue-900 mb-6">
                Edit {{ $swimmer->forename }}'s Information Here:
            </h1>
            @php $fullName = $swimmer->forename . ' ' . $swimmer->surname; @endphp
            <form action="{{ route('swimmers.update', $swimmer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="swimmer-container">
                    <div class="float-right mb-4">
                        <img src="{{ Vite::asset('resources/images/personIcon3.jpg') }}" alt="Swimmer Photo"
                             class="h-40 w-35 object-cover">
                    </div>
                    <div class="col-span- space-y-1">
                        <div>
                            <label class="block font-semibold mb-1">Forename:</label>
                            <input type="text" name="forename" value="{{ $swimmer->forename }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Surname:</label>
                            <input type="text" name="surname" value="{{ $swimmer->surname }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Email:</label>
                            <input type="email" name="email" value="{{ $swimmer->email }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Date of Birth:</label>
                            <input type="date" name="dob" value="{{ Carbon::parse($swimmer->dob)->format('Y-m-d') }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Age:</label>
                            <input type="text" value="{{ Carbon::parse($swimmer->dob)->age }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500"
                                   readonly>
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Squad:</label>
                            <select name="squad_id"
                                    class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900">
                                @foreach($allSquads as $availableSquad)
                                    <option value="{{ $availableSquad->id }}"
                                        {{ $swimmer->squad_id == $availableSquad->id ? 'selected' : '' }}>
                                        {{ $availableSquad->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Phone Number:</label>
                            <input type="text" name="phone" value="{{ $swimmer->phone }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Address:</label>
                            <input type="text" name="address" value="{{ $swimmer->address }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Postcode:</label>
                            <input type="text" name="postcode" value="{{ $swimmer->postcode }}"
                                   class="bg-white rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500">
                        </div>

                        <div class="flex gap-4 mt-4">
                            <button type="submit"
                                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update
                            </button>
                            <a href="{{ route('swimmers.index') }}"
                               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-gray-400">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
