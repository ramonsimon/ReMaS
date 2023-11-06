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

        Onderdeel::create([
            'naam' => $this->naam,
            'omschrijving' => $this->omschrijving,
            'voorraad_kg' => $this->voorraad_kg,
            'prijs_per_kg' => $this->prijs_per_kg,
        ]);


        // redirect naar onderdelen
        $this->redirect(route('onderdelen'));
    }





    public function render()
    {
        return view('livewire.onderdeel-toevoegen');
    }
}
