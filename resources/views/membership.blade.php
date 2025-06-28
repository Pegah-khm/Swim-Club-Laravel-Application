@props(['heading' => ''])

<x-layout :heading="$heading">
    <main class="max-w-4xl mx-auto px-4 py-10 text-gray-800">

        <p class="mb-6 leading-relaxed">
            Join our Swim Club to enjoy full access to our swimming facilities, exclusive training sessions,
            and competitive events!
        </p>

        <div class="bg-blue-50 border-l-4 border-blue-600 p-4 rounded mb-8">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Membership Benefits:</h3>
            <ul style="list-style-type: disc; padding-left: 1.5rem;" class="text-blue-900">
                <li>Unlimited access during public hours</li>
                <li>Discounts on swim gear</li>
                <li>Personalised training support</li>
            </ul>
        </div>

        <h3 class="text-lg font-semibold text-blue-900 mb-3">Membership Fees</h3>
        <table class="w-full text-sm border border-gray-300 table-fixed mb-8">
            <thead class="text-white">
            <tr>
                <th style="background-color: #1e3a8a; color: white;">Category</th>
                <th style="background-color: #1e3a8a; color: white;">Monthly</th>
                <th style="background-color: #1e3a8a; color: white;">Yearly</th>
            </tr>
            </thead>
            <tbody>
            <tr class="border-t">
                <td class="px-4 py-2">Junior (under 18)</td>
                <td class="px-4 py-2">£20</td>
                <td class="px-4 py-2">£200</td>
            </tr>
            <tr class="bg-blue-50 border-t">
                <td class="px-4 py-2">Adult</td>
                <td class="px-4 py-2">£30</td>
                <td class="px-4 py-2">£300</td>
            </tr>
            <tr class="border-t">
                <td class="px-4 py-2">Family (up to 4)</td>
                <td class="px-4 py-2">£70</td>
                <td class="px-4 py-2">£700</td>
            </tr>
            </tbody>
        </table>

        <div class="text-center">
            <a href="/" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                Back to Home
            </a>
            <a href="/register" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-800 transition">
                Join Now
            </a>
         </div>

    </main>
</x-layout>
