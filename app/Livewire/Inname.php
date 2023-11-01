<?php

namespace App\Livewire;

use App\Models\Apparaat;
use Livewire\Component;

class Inname extends Component
{
    public $apparaten;
    public $ingenomen = [];
    public $totaalbedrag = 0.00;

    public function mount()
    {
        $this->apparaten = Apparaat::all();
    }

    public function innemen($id)
    {
        $apparaat = Apparaat::findOrFail($id);
        $this->ingenomen[$id] = $apparaat;
        $this->totaalbedrag += $apparaat->vergoeding;
    }

    public function terugnemen($id)
    {
        if (isset($this->ingenomen[$id])) {
            $this->totaalbedrag -= $this->ingenomen[$id]->vergoeding;
            unset($this->ingenomen[$id]);
        }
    }

    public function allesTerugnemen()
    {
        $this->ingenomen = [];
        $this->totaalbedrag = 0.00;
    }

    public function render()
    {
        return view('livewire.inname');
    }
}
