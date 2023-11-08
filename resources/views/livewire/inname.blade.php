<div class="p-6 bg-white shadow-md rounded-lg">
    <div class="grid grid-cols-3 gap-4">
        <!-- Medewerker en Tijdstip Section -->
        <div class="col-span-3 flex justify-between items-center mb-6">
            <div class="flex items-center space-x-2">
                <label for="medewerker" class="font-semibold">Medewerker:</label>
                <select name="medewerker" id="medewerker" wire:model="medewerker_id" class="p-2 border rounded" >
                    <option value="1">Koos</option>

                </select>
            </div>
            <div>
                <span class="font-semibold">Tijdstip ontvangst:</span>
                <div x-data="timeHandler()" x-init="startUpdating()">
                    <span x-text="currentTime"></span>
                </div>
            </div>
        </div>

        <!-- Apparaten Section -->
        <div class="col-span-1 p-4 border rounded bg-gray-100">
            <button wire:click="innemen({{ $geselecteerdApparaat }})" class="bg-blue-500 text-white px-4 py-2 rounded-l-full border-r-2 border-blue-700 hover:bg-blue-600" title="Apparaat innemen">
                <i class="fas fa-arrow-right" title="Apparaat innemen"></i>
            </button>

            <h2 class="text-xl font-bold mb-4">Apparaten</h2>
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="border px-4 py-2 bg-gray-200">Naam</th>
                    <th class="border px-4 py-2 bg-gray-200">Vergoeding</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apparaten as $apparaat)
                    <tr x-on:dblclick="selectedApparaat = {{ $apparaat->id }}; $wire.innemen({{ $apparaat->id }})" wire:click="selectApparaat({{ $apparaat->id }})" title="Selecteer dit apparaat" class="{{ $geselecteerdApparaat == $apparaat->id ? 'bg-green' : '' }}">
                        <td class="border px-4 py-2">{{ $apparaat->naam }}</td>
                        <td class="border px-4 py-2">€ {{ number_format($apparaat->vergoeding, 2, ',', '') }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <!-- Ingenomen Section -->
        <div class="col-span-1 p-4 border rounded bg-gray-100">
            <button wire:click="terugnemen({{ $geselecteerdApparaat }})" title="Geselecteerd apparaat terugnemen" class="bg-blue-500 text-white px-4 py-2 rounded-r-full border-l-2 border-blue-700 hover:bg-blue-600">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button wire:click="allesTerugnemen" title="Alle ingenomen apparaten terugnemen" class="bg-blue-500 text-white px-4 py-2 rounded-r-full border-l-2 border-blue-700 hover:bg-blue-600">
                <i class="fas fa-arrow-left"></i><i class="fas fa-arrow-left"></i>
            </button>

            <h2 class="text-xl font-bold mb-4">Ingenomen</h2>
            <table class="min-w-full">
                <thead>
                <tr >
                    <th class="border px-4 py-2 bg-gray-200">Aantal</th>
                    <th class="border px-4 py-2 bg-gray-200">Apparaat</th>
                    <th class="border px-4 py-2 bg-gray-200">Vergoeding</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ingenomen as $index => $item)
                    <tr x-on:dblclick="selectedIngenomen = { index: {{ $index }}, id: {{ $item['apparaat']->id }} }; $wire.terugnemen()" wire:click="selectIngenomenApparaat({{ $index }}, {{ $item['apparaat']->id }})" class="{{ $geselecteerdIngenomenApparaat['index'] === $index ? 'bg-green' : '' }}">
                        <td class="border px-4 py-2 text-center">{{ $item['aantal'] }}</td>
                        <td class="border px-4 py-2">{{ $item['apparaat']->naam }}</td>
                        <td class="border px-4 py-2">€ {{ number_format($item['apparaat']->vergoeding * $item['aantal'], 2, ',', '') }}</td>
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
        <a href="{{route('homepage')}}" class="bg-red-500 text-white px-4 py-2 rounded">Annuleren</a>
        <a href="#" wire:click="innemenEnOpslaan" class="bg-green text-white px-4 py-2 rounded">Innemen en bon afdrukken</a>
    </div>
    <script>
        function timeHandler() {
            return {
                currentTime: '{{ \Carbon\Carbon::now()->timezone('Europe/Amsterdam')->format('d-m-Y H:i:s') }}',

                startUpdating() {
                    setInterval(() => {
                        this.updateTime();
                    }, 1000); // Update every second
                },

                updateTime() {
                    let now = new Date();
                    this.currentTime = now.toLocaleDateString('nl-NL', {
                        timeZone: 'Europe/Amsterdam',
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });
                }
            }
        }
    </script>
</div>
