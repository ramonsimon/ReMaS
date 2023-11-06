<?php

namespace App\Livewire;

use App\Models\Apparaat;
use App\Models\InnameApparaat;
use App\Models\Medewerker;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inname extends Component
{
    public $apparaten;
    public $ingenomen = [];
    public $totaalbedrag = 0.00;
    public $medewerker_id = 1;
    public $geselecteerdApparaat = null;
    public $geselecteerdIngenomenApparaat = ['index' => null, 'id' => null];

    // Laad alle apparaten in bij het opstarten van de pagina.
    public function mount(Apparaat $apparaatModel)
    {
        $this->apparaten = $apparaatModel->all();
    }

    // Selecteer een specifiek ingenomen apparaat.
    public function selectIngenomenApparaat($index, $id)
    {
        $this->geselecteerdIngenomenApparaat = ['index' => $index, 'id' => $id];
    }

    // Selecteer een specifiek apparaat.
    public function selectApparaat($id)
    {
        $this->geselecteerdApparaat = $id;
    }

    // Neem een specifiek apparaat op.
    public function innemen($id)
    {
        $apparaat = Apparaat::findOrFail($id);
        $this->ingenomen[] = $apparaat;
        $this->totaalbedrag += $apparaat->vergoeding;
    }

    // Neem het geselecteerde ingenomen apparaat terug.
    public function terugnemen()
    {
        $index = $this->geselecteerdIngenomenApparaat['index'];

        // Als het apparaat gevonden is, neem het dan terug en update het totaalbedrag.
        if ($index !== null && isset($this->ingenomen[$index])) {
            $this->totaalbedrag -= $this->ingenomen[$index]->vergoeding;
            array_splice($this->ingenomen, $index, 1);
            $this->geselecteerdIngenomenApparaat = ['index' => null, 'id' => null]; // Reset the selection after taking back
        }
    }

    // Slaat de ingenomen apparaten onder de betreffende medewerker en stuur de gebruiker door naar de bon.
    public function innemenEnOpslaan()
    {
        $medewerker = Medewerker::find($this->medewerker_id);

        // Als er geen medewerker kan worden gevonden, zal de code hierna niet worden uitgevoerd.
        if (!$medewerker) {
            return;
        }
        // Start database transactie
        DB::transaction(function () use ($medewerker) {

            // Sla de Inname op
            $inname = \App\Models\Inname::create([
                'medewerker_id' => $medewerker->id,
                'tijdstip' => now(),
            ]);

            // Loop door elk ingenomen apparaat en sla het op.
            foreach ($this->ingenomen as $apparaat) {
                InnameApparaat::create([
                    'inname_id' => $inname->id,
                    'apparaat_id' => $apparaat->id,
                    'ontleed' => false,
                ]);
            }
            return redirect()->route('bon', ['inname' => $inname]);

        });

    }
    // Zet alle ingenomen apparaten terug en reset het totaalbedrag.
    public function allesTerugnemen()
    {
        $this->ingenomen = [];
        $this->totaalbedrag = 0.00;
    }


}
