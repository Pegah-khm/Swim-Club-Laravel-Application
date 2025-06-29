<x-layout heading="Swim Teams (Squads)">
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8 space-y-10">

        @php
            /** @var \App\Models\User $user */
            $user = auth()->user();
        @endphp
        @foreach ($squads as $squad)
            <div>
                <h2 class="text-2xl font-bold text-blue-900 mb-4">
                    {{ $squad->name }}
                    @if ($squad->coach)
                        <span
                            class="text-lg font-medium text-gray-700">— Coach: {{ $squad->coach->forename }} {{ $squad->coach->surname }}</span>
                    @else
                        <span class="text-lg font-medium text-gray-500">— Coach: N/A</span>
                    @endif
                </h2>

                <table class="w-full table-auto text-center border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                    <tr>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Squad Name</th>
                        @if($user && $user->role === 'club_official')
                            <th>Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($squad->swimmers as $swimmer)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $swimmer->forename }}</td>
                            <td class="border px-4 py-2">{{ $swimmer->surname }}</td>
                            <td class="border px-4 py-2">{{ $swimmer->email }}</td>
                            <td class="border px-4 py-2">{{ $squad->name }}</td>
                            @if(in_array(optional(auth()->user())->role, ['club_official', 'coach']))
                                <td>
                                    <a href="{{ route('squads.edit', $squad->id) }}" class="action-button">Edit</a>
                                    <form action="{{ route('squads.removeSwimmer', [$squad->id, $swimmer->id]) }}"
                                          method="POST"
                                          class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center text-gray-500">
                                No swimmers assigned to this squad.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="mt-6">
            <a href="/" class="button">Back</a>
        </div>
    </div>
</x-layout>
