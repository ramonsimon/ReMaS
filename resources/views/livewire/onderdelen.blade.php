<div class="min-w-full overflow-x-auto">
    <style>


        /* Print specific styles */
        @media print {
            body * {
                visibility: hidden;
            }

            table, table * {
                visibility: visible;
            }

            table {
                position: absolute;
                left: 0;
                top: 0;
            }

            th, td {
                background-color: #fff; /* Override any background colors */
            }

            /* Hide unwanted elements during printing */
            .no-print {
                display: none;
            }
        }
    </style>
    <table class="min-w-full bg-white">
        <thead>
        <tr>
            <th class="py-2 px-3 border-b">Naam</th>
            <th class="py-2 px-3 border-b">Omschrijving</th>
            <th class="py-2 px-3 border-b">Verkoopprijs per kg</th>
            <th class="py-2 px-3 border-b">Voorraad (kg)</th>
            <th class="py-2 px-3 border-b text-center">
                <a href="{{route('onderdeeltoevoegen')}}" class="no-print fas fa-plus-circle text-green-500"></a>
                <i wire:click="editSelectedRow" class="no-print {{ is_null($selectedRow) ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} fas fa-pencil-alt text-yellow-500"></i>
                <i wire:click="deleteSelectedRow" class="no-print {{ is_null($selectedRow) ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} fas fa-trash-alt text-red-500"></i>
                <button onclick="window.print();" class="no-print fas fa-print text-blue-500 cursor-pointer"></button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($onderdelen as $onderdeel)
            <tr wire:click="selectRow({{ $onderdeel->id }})" class="{{ $selectedRow == $onderdeel->id ? 'bg-green' : '' }}">
                <td class="py-2 px-3 border-b">{{ $onderdeel->naam }}</td>
                <td class="py-2 px-3 border-b">{{ $onderdeel->omschrijving }}</td>
                <td class="py-2 px-3 border-b">€ {{ number_format($onderdeel->prijs_per_kg, 2) }}</td>
                <td class="py-2 px-3 border-b">{{ $onderdeel->voorraad_kg }}</td>
                <td class="py-2 px-3 border-b text-center"></td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
