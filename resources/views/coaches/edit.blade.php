@php use Carbon\Carbon; @endphp
<x-layout>
    <main>
        <div class="mx-auto max-w-4xl py-6 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-blue-900 mb-6">
                Edit Coach: {{ $coach->forename }} {{ $coach->surname }}
            </h1>

            <form action="{{ route('coaches.update', $coach->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 bg-gray-300 gap-6 shadow-md rounded p-6">

                    <div>
                        <label class="block font-semibold mb-1">First Name</label>
                        <input type="text" name="forename" value="{{ old('forename', $coach->forename) }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Last Name</label>
                        <input type="text" name="surname" value="{{ old('surname', $coach->surname) }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $coach->email) }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ Carbon::parse($coach->dob)->format('Y-m-d') }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $coach->phone) }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Postcode</label>
                        <input type="text" name="postcode" value="{{ old('postcode', $coach->postcode) }}"
                               class="bg-white border border-gray-300 rounded px-4 py-2">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-semibold mb-1">Address</label>
                        <input type="text" name="address" value="{{ old('address', $coach->address) }}"
                               class="bg-white w-full border border-gray-300 rounded px-4 py-2">
                    </div>



                </div>


                <div class="flex gap-4 mt-4">
                    <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update
                    </button>
                    <a href="{{ route('coaches.index') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-gray-400">Back</a>
                </div>
            </form>
        </div>
    </main>
</x-layout>
