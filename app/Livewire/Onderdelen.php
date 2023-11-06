<?php

namespace App\Livewire;

use App\Models\Onderdeel;
use Livewire\Component;

class Onderdelen extends Component
{

    public $selectedRow = null;
    public $onderdelen;

    // Laad alle onderdelen in bij het opstarten van de pagina.
    public function mount()
    {
        $this->onderdelen = Onderdeel::all();
    }

    // Sla de geselecteerde rij op
    public function selectRow($id)
    {
        $this->selectedRow = $id;
    }

    // Redirect naar onderdelenAanpassen + id
    public function editSelectedRow()
    {
        if ($this->selectedRow) {
            return redirect()->route('onderdelenaanpassen', $this->selectedRow);
        }
    }

    // Verwijder de geselecteerde rij
    public function deleteSelectedRow()
    {
        if ($this->selectedRow) {
            // Zoek het onderdeel op basis van de ID en verwijder het
            $onderdeel = Onderdeel::find($this->selectedRow);

            if ($onderdeel) {
                $onderdeel->delete();

                // Na het verwijderen, ververs de lijst van onderdelen
                $this->onderdelen = Onderdeel::all();
            } else {
            }
        }
    }

    public function render()
    {
        return view('livewire.onderdelen');
    }
}
