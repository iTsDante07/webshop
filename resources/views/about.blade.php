<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-5xl font-bold mb-6 text-center">Over Ons</h1>
        <p class="text-lg text-gray-700 mb-12 text-center">
            Wij zijn toegewijd aan het leveren van kwaliteitsproducten en een uitstekende service. Lees meer over onze geschiedenis en wat ons drijft.
        </p>

        <div class="bg-blue-100 p-6 rounded-lg mb-12 text-center">
            <h2 class="text-3xl font-semibold mb-2">Onze Missie</h2>
            <p class="text-lg">Wij streven ernaar om onze klanten de beste online winkelervaring te bieden.</p>
        </div>

        <h2 class="text-3xl font-semibold mb-6">Ons Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/team1.jpg') }}" alt="Team Member 1" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">Jane Doe</h3>
                <p class="text-gray-600">CEO</p>
            </div>

            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/team2.jpg') }}" alt="Team Member 2" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">John Smith</h3>
                <p class="text-gray-600">Marketing Manager</p>
            </div>

            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/team3.jpg') }}" alt="Team Member 3" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">Emily Johnson</h3>
                <p class="text-gray-600">Lead Developer</p>
            </div>
        </div>
    </div>
</x-base-layout>
