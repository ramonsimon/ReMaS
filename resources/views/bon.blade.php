<div class="p-6 bg-white border-b border-gray-200">
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Bon
        </h3>
    </div>

    <div class="p-4">
        <div class="flex justify-between">
            <span>Product</span>
            <span>Prijs</span>
        </div>

        <!-- Voeg hier producten en prijzen toe -->
        <div class="flex justify-between">
            <span>Item 1</span>
            <span>€10.00</span>
        </div>
        <!-- ... andere producten ... -->

        <hr class="my-4">

        <div class="flex justify-between font-bold">
            <span>Totaal</span>
            <span>€10.00</span>
        </div>

        <button class="mt-4 px-4 py-2 bg-blue-600 text-white" wire:click="printReceipt">Print Bon</button>
    </div>
</div>
