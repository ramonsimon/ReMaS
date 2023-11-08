<?php

namespace App\Livewire;

use App\Models\InnameApparaat;
use Livewire\Component;

class BonPrinten extends Component
{

    public $inname;
    public $ingenomenItems;

    // Haal de Inname uit de database met de id in de route
    public function mount(\App\Models\Inname $inname)
    {
        $this->inname = $inname;
        $this->ingenomenItems = $this->ingenomenItems();

    }

    protected function ingenomenItems()
    {
        // Haal alle apparaten die gekoppeld zijn aan de inname_id en groepeer
        // de apparaten met dezelfde id
        return InnameApparaat::with('apparaat')
            ->where('inname_id', $this->inname->id)
            ->get()
            ->groupBy('apparaat_id')
            ->map(function ($item, $key) {
                $eersteItem = $item->first();
                return [
                    'naam' => $eersteItem->apparaat->naam,
                    'vergoeding' => $eersteItem->apparaat->vergoeding,
                    'aantal' => $item->count(),
                    'totaal' => $eersteItem->apparaat->vergoeding * $item->count()
                ];
            })
            ->values();
    }
    public function render()
    {

        return view('livewire.bon-printen');
    }
}
