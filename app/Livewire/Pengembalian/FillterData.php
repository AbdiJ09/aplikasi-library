<?php

namespace App\Livewire\Pengembalian;

use Livewire\Component;

class FillterData extends Component
{
    public $selectedOption = '';
    public function fillter()
    {
        $this->dispatch('fillter', $this->selectedOption);
    }
    public function render()
    {
        return view('livewire.pengembalian.fillter-data');
    }
}
