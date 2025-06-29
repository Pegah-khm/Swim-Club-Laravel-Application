<x-layout heading="Edit Squad">
    <div class="max-w-2xl mx-auto py-6">
        <form method="POST" action="{{ route('squads.update', $squad->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-semibold">Squad Name</label>
                <input class="bg-white border border-gray-300 rounded px-3 py-2 my-2"
                       type="text" id="name" name="name" value="{{ old('name', $squad->name) }}"
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="coach_id" class="block font-semibold">Coach</label>
                <select id="coach_id" name="coach_id" class="bg-white border border-gray-300 rounded px-3 py-2">
                    <option value="">-- No Coach Assigned --</option>
                    @foreach($coaches as $coach)
                        <option value="{{ $coach->id }}" {{ $squad->coach_id == $coach->id ? 'selected' : '' }}>
                            {{ $coach->forename }} {{ $coach->surname }}
                        </option>
                    @endforeach
                </select>
                @error('coach_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4 mt-4">
                <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update
                </button>
                <a href="{{ route('squads.index') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-gray-400">Back</a>
            </div>
        </form>
    </div>
</x-layout>
