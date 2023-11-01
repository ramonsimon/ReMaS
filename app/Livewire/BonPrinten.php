<?php

namespace App\Livewire;

use Livewire\Component;

class BonPrinten extends Component
{

    public function printReceipt()
    {
        // Logica voor printen
        $window = 'window.open("", "PRINT", "height=400,width=600");';
        $window .= 'window.document.write("<html><head><title>Receipt</title></head><body>");';
        $window .= 'window.document.write(document.getElementById("printArea").outerHTML);';
        $window .= 'window.document.write("</body></html>");';
        $window .= 'window.document.close();';
        $window .= 'window.print();';

        $this->dispatchBrowserEvent('print-receipt', ['script' => $window]);
    }


    public function render()
    {
        return view('livewire.bon-printen');
    }
}
