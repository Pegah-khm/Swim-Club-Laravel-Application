@props(['heading'])

<x-layout>
    <main class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center text-blue-900 mb-8">Timetable</h1>

        <div class="overflow-x-auto">
            <table class="w-full border border-collapse text-sm text-center shadow-sm table-fixed">
                @php
                    $days = ['Time', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                @endphp

                <thead>
                <tr>
                    @foreach ($days as $day)
                        <th style="background-color: #1e3a8a; color: white;">{{ $day }}</th>
                    @endforeach
                </tr>
                </thead>

                <tbody class="text-gray-800">
                @php
                    $rows = [
                        '7:15 AM' => ['PUBLIC', 'CLOSED', 'PUBLIC', 'CLOSED', 'PUBLIC', 'CLOSED', 'CLOSED'],
                        '8:00 AM' => ['PUBLIC', 'CLOSED', 'PUBLIC', 'CLOSED', 'PUBLIC', 'CLOSED', 'CLOSED'],
                        '9 AM' => ['PUBLIC', 'PUBLIC', 'PUBLIC', 'PUBLIC until 9:50', 'PUBLIC', 'CLOSED', 'CLOSED'],
                        '10 AM' => ['PRIVATE', 'PUBLIC & 1 Lane Private & Learner Pool Private', 'PUBLIC & Aqua Blast', 'PRIVATE', 'PUBLIC', 'PRIVATE', 'PUBLIC'],
                        '11 AM' => ['PUBLIC', 'PRIVATE', 'PRIVATE', 'PRIVATE', 'PUBLIC & 1 Lane Private & Learner Pool Private', 'PRIVATE', 'PUBLIC TILL 11:50'],
                        '12 PM' => ['PUBLIC', 'PRIVATE', 'PRIVATE', 'PUBLIC', 'PRIVATE', 'PRIVATE', ''],
                        '1 PM' => ['PUBLIC', 'PUBLIC', 'PUBLIC', 'PUBLIC', 'PRIVATE @ 1.05', 'PUBLIC', ''],
                    ];
                @endphp

                @foreach ($rows as $time => $slots)
                    <tr class="hover:bg-blue-50">
                        <td class="border px-2 py-2 font-semibold bg-blue-100 text-blue-900 w-24 whitespace-nowrap">{{ $time }}</td>
                        @foreach ($slots as $slot)
                            <td class="border px-3 py-2 break-words w-[12.5%]">{{ $slot }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        <div class="mt-8 text-center">
            <a href="/" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Back to Home</a>
        </div>
    </main>
</x-layout>

