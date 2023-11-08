<?php

namespace App\Livewire;

use App\Models\Onderdeel;
use Livewire\Component;

class OnderdeelToevoegen extends Component
{

    public $naam;
    public $omschrijving;
    public $voorraad_kg;
    public $prijs_per_kg;

    public function save()
    {

        // Valideer de input velden
        $validatedData = $this->validate([
            'naam' => 'required|unique:onderdelen,naam',
            'omschrijving' => 'required',
            'voorraad_kg' => 'required|numeric',
            'prijs_per_kg' => 'required|numeric',
        ]);

        // Maak een nieuw onderdeel aan met de gevalideerde gegevens
        Onderdeel::create($validatedData);


        // redirect naar onderdelen
        $this->redirect(route('onderdelen'));
    }
    public function render()
    {
        return view('livewire.onderdeel-toevoegen');
    }
}
