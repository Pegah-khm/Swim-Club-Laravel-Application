<x-layout heading="Upcoming events and meets">
    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="fixed top-24 left-1/2 transform -translate-x-1/2 z-50"
        >
            <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-3 rounded shadow-md">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <main>
        <div class="overflow-x-auto mx-auto max-w-[81rem] py-6 sm:px-6 lg:px-8">
            <table>
                <thead>
                <tr>
                    <th class="fit-content">Event ID</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Squad ID</th>
                    @if(auth()->user()->role === 'club_official')
                        <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr id="{{ $event->id }}">
                        <td class="center-align fit-content">{{ $event->id }}</td>
                        <td class="fit-content">{{ $event->name }}</td>
                        <td class="max-w-xs whitespace-normal break-words">{{ $event->description }}</td>
                        <td class="fit-content">{{ $event->location }}</td>
                        <td class="fit-content">{{ $event->date }}</td>
                        <td class="fit-content">{{ $event->time }}</td>
                        <td class="center-align fit-content">{{ $event->squad_id }}</td>
                        @if(auth()->user()->role === 'club_official')
                        <td class="center-align fit-content">
                            <a href="{{ route('events.edit', $event->id) }}" class="action-button">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-6 flex justify-center items-center space-x-4">
                {{ $events->links() }}
            </div>
            <div class="mt-1 space-x-4">
                <a href="/" class="button">Back</a>
                @if(auth()->user()->role === 'club_official')
                    <a href="{{ route('events.create') }}" class="button">Add event</a>
                @endif
            </div>
        </div>
    </main>
</x-layout>
