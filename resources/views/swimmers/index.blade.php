<x-layout heading="Our Swimmers">
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
        <div class="mx-auto max-w-screen-xl py-6 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <table class="w-full max-w-screen-lg text-center border border-gray-300">
                    <thead>
                    <tr>
                        <th>Membership No.</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Squad ID</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($swimmers as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->forename }}</td>
                            <td>{{ $member->surname }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->squad_id ?? '—' }}</td>
                            <td>
                                <a href="{{ route('swimmers.show', $member->id) }}" class="action-button">View
                                    details</a>

                                @if(auth()->user()->role === 'club_official')
                                    <a href="{{ route('swimmers.edit', $member->id) }}" class="action-button">Edit</a>

                                    <form action="{{ route('swimmers.destroy', $member->id) }}" method="POST"
                                          class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center items-center space-x-4">
                {{ $swimmers->links() }}
            </div>


            <div class="mt-1 mx-23 space-x-4">
                <a href="/" class="button">Back</a>
                @if(auth()->user()->role === 'club_official')
                    <a href="{{ route('swimmers.create') }}" class="button">Add a new swimmer</a>
                @endif
            </div>
        </div>
        </div>
    </main>
</x-layout>
