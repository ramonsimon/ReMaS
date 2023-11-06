<?php

namespace App\Livewire;

use App\Models\InnameApparaat;
use Livewire\Component;

class BonPrinten extends Component
{

    public $inname;
    public $ingenomenItems;

    // Hier haal ik de ID uit de route koppel het aan de DB en zet het in public.
    public function mount(\App\Models\Inname $inname)
    {
        $this->inname = $inname;
        $this->ingenomenItems = $inname->apparaten;
    }

    public function render()
    {

        return view('livewire.bon-printen');
    }
}
