<div class="receipt p-4 max-w-sm mx-auto border rounded shadow">
    <div class="text-center mb-4">
        <h1 class="text-2xl font-bold">Superior Waste - ReMaS</h1>
        <p class="text-xl">bon</p>
    </div>
    <div>
        <p>Datum: <span class="font-bold">{{ \Carbon\Carbon::parse($inname->tijdstip)->format('d M Y H:i') }}</span></p>
        <p>Medewerker: <span class="font-bold">{{ $inname->medewerker_id }}</span></p>
        <p>Bonnummer: <span class="font-bold">{{ $inname->id }}</span></p>
    </div>
    <table class="w-full mt-4">
        <tbody>
        @foreach($ingenomenItems as $apparaat)
            <tr>
                <td class="py-1">{{ $apparaat->naam }}</td>
                <td class="text-right py-1">{{ $apparaat->vergoeding }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-right mt-4 border-t pt-2">
        <p class="font-bold">Totaal {{ $ingenomenItems->sum('vergoeding') }}</p>
    </div>
    <button class="print-button px-4 py-2 bg-blue-500 text-white rounded mt-4" onclick="window.print();">Print Bon
    </button>
</div>
