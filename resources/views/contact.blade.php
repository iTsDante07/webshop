<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-5xl font-bold mb-6 text-center">Neem Contact Op</h1>
        <p class="text-lg text-gray-700 mb-12 text-center">
            Wij horen graag van je! Neem contact op voor vragen, opmerkingen of suggesties.
        </p>

        <div class="max-w-lg mx-auto bg-blue-100 p-6 rounded-lg mb-12">
            <form action="/contact" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700">Naam</label>
                    <input type="text" id="name" name="name" class="w-full mt-1 p-2 border rounded-lg" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700">E-mail</label>
                    <input type="email" id="email" name="email" class="w-full mt-1 p-2 border rounded-lg" required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700">Bericht</label>
                    <textarea id="message" name="message" class="w-full mt-1 p-2 border rounded-lg" rows="4" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600">Verstuur</button>
            </form>
        </div>
    </div>
</x-base-layout>
