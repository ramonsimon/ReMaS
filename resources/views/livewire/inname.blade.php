<div class="p-6 bg-white shadow-md rounded-lg">
    <div class="grid grid-cols-3 gap-4">

        <!-- Medewerker en Tijdstip Section -->
        <div class="col-span-3 flex justify-between items-center mb-6">
            <div class="flex items-center space-x-2">
                <label for="medewerker" class="font-semibold">Medewerker:</label>
                <select name="medewerker" id="medewerker" class="p-2 border rounded">
                    <option value="Koos">Koos</option>
                    <!-- Andere medewerkers -->
                </select>
            </div>
            <div>
                <span class="font-semibold">Tijdstip ontvangst:</span>
                <span>23-05-2018 21:40</span>
            </div>
        </div>

        <!-- Apparaten Section -->
        <div class="col-span-1 p-4 border rounded bg-gray-100">
            <h2 class="text-xl font-bold mb-4">Apparaten</h2>
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="border px-4 py-2 bg-gray-200">Naam</th>
                    <th class="border px-4 py-2 bg-gray-200">Vergoeding</th>
                    <th class="border px-4 py-2 bg-gray-200">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apparaten as $apparaat)
                    <tr>
                        <td class="border px-4 py-2">{{ $apparaat->naam }}</td>
                        <td class="border px-4 py-2">€ {{ number_format($apparaat->vergoeding, 2) }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="innemen({{ $apparaat->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Innemen</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ingenomen Section -->
        <div class="col-span-1 p-4 border rounded bg-gray-100">
            <h2 class="text-xl font-bold mb-4">Ingenomen</h2>
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="border px-4 py-2 bg-gray-200">Apparaat</th>
                    <th class="border px-4 py-2 bg-gray-200">Vergoeding</th>
                    <th class="border px-4 py-2 bg-gray-200">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ingenomen as $id => $apparaat)
                    <tr>
                        <td class="border px-4 py-2">{{ $apparaat->naam }}</td>
                        <td class="border px-4 py-2">€ {{ number_format($apparaat->vergoeding, 2) }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="terugnemen({{ $id }})" class="bg-red-500 text-white px-2 py-1 rounded">Terugnemen</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totaalbedrag Section -->
        <div class="col-span-1 p-4 border rounded bg-gray-100">
            <h2 class="text-xl font-bold mb-4">Totaalbedrag</h2>
            <p class="text-2xl font-semibold">€ {{ number_format($totaalbedrag, 2) }}</p>
        </div>

    </div>
    <div class="mt-6 flex justify-between">
        <button class="bg-red-500 text-white px-4 py-2 rounded">Annuleren</button>
        <a href="{{route('bon')}}" class="bg-green text-white px-4 py-2 rounded">Innemen en bon afdrukken</a>
    </div>
</div>
