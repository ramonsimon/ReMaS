<?php

namespace App\Livewire;

use App\Models\Onderdeel;
use Livewire\Component;

class OnderdelenAanpassen extends Component
{
    public $onderdeel;
    public $naam;
    public $omschrijving;
    public $voorraad_kg;
    public $prijs_per_kg;
    public $onderdeelId;


    public function mount($id)
    {
        $onderdeel = Onderdeel::find($id);

        $this->onderdeelId = $onderdeel->id;
        $this->naam = $onderdeel->naam;
        $this->omschrijving = $onderdeel->omschrijving;
        $this->voorraad_kg = $onderdeel->voorraad_kg;
        $this->prijs_per_kg = $onderdeel->prijs_per_kg;
    }

    public function save()
    {
        $onderdeel = Onderdeel::find($this->onderdeelId);

        $onderdeel->update([
            'naam' => $this->naam,
            'omschrijving' => $this->omschrijving,
            'voorraad_kg' => $this->voorraad_kg,
            'prijs_per_kg' => $this->prijs_per_kg
        ]);

        return redirect()->route('onderdelen');
    }

    public function render()
    {
        return view('livewire.onderdelen-aanpassen');
    }
}
