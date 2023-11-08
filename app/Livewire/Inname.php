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
    public function innemen($id = null)
    {
        if (!$id) {
            // Voor het geval dat er niks is geselecteerd.
            return;
        }

        $apparaat = Apparaat::findOrFail($id);
        $gevondenIndex = null;

        // Controleer of het apparaat al in de lijst staat
        foreach ($this->ingenomen as $index => $item) {
            if ($item['apparaat']->id === $id) {
                $gevondenIndex = $index;
                break;
            }
        }

        // Als het apparaat al in de lijst staat, verhoog dan alleen het aantal.
        if ($gevondenIndex !== null) {
            $this->ingenomen[$gevondenIndex]['aantal']++;
        } else {
            // Zo niet, voeg het apparaat toe met aantal 1
            $this->ingenomen[] = ['apparaat' => $apparaat, 'aantal' => 1];
        }

        // Update het totaalbedrag
        $this->totaalbedrag += $apparaat->vergoeding;
    }


    // Neem het geselecteerde ingenomen apparaat terug
    public function terugnemen()
    {
        $index = $this->geselecteerdIngenomenApparaat['index'];

        if ($index !== null && isset($this->ingenomen[$index])) {
            $apparaatVergoeding = $this->ingenomen[$index]['apparaat']->vergoeding;

            // als er maar een apparaat aanwezig is, verlaag het totaalbedrag
            if ($this->ingenomen[$index]['aantal'] > 1) {
                $this->ingenomen[$index]['aantal']--;
                $this->totaalbedrag -= $apparaatVergoeding;
            } else {
                // Verlaag het totaalbedrag
                $this->totaalbedrag -= $apparaatVergoeding;
                // wanneer er maar 1 is, verwijder het helemaal
                array_splice($this->ingenomen, $index, 1);
            }
            //Reset de selectie
            $this->geselecteerdIngenomenApparaat = ['index' => null, 'id' => null];
        }
    }



    // Slaat de ingenomen apparaten op aan de betreffende medewerker
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
            foreach ($this->ingenomen as $ingenomenItem) {
                for ($i = 0; $i < $ingenomenItem['aantal']; $i++) {
                    InnameApparaat::create([
                        'inname_id' => $inname->id,
                        'apparaat_id' => $ingenomenItem['apparaat']->id,
                        'ontleed' => false,
                    ]);
                }
            }

            // redirect naar de bonpagina
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
