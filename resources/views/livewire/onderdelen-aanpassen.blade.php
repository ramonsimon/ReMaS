<div class="p-6 bg-white shadow-md rounded-lg">
    <div class="mb-4">
        <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
        <input type="text" id="naam" name="naam" wire:model="naam"
               class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label for="omschrijving" class="block text-sm font-medium text-gray-700">Omschrijving</label>
        <input type="text" id="omschrijving" name="omschrijving" wire:model="omschrijving"
               class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label for="verkoopprijs" class="block text-sm font-medium text-gray-700">Verkoopprijs per kg</label>
        <input type="number" id="verkoopprijs" name="verkoopprijs" wire:model="prijs_per_kg" step="0.01"
               class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-4">
        <label for="voorraad" class="block text-sm font-medium text-gray-700">Voorraad (kg)</label>
        <input type="number" id="voorraad" name="voorraad"  wire:model="voorraad_kg" step="0.001"
               class="mt-1 p-2 w-full border rounded-md">
    </div>
    <form wire:submit.prevent="save">
    <div class="flex gap-4">
        <button type="submit" class="px-4 py-2 bg-green text-white rounded-md hover:bg-green-600">Bewaren</button>
        <a href="{{route('onderdelen')}}" type="button" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Annuleren</a>
    </div>
    </form>
</div>
