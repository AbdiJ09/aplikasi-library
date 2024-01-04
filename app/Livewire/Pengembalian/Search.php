<?php

namespace App\Livewire\Pengembalian;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Search extends Component
{
    public $value;
    public function search()
    {
        $this->dispatch('search', $this->value);
    }
    public function render()
    {
        return view('livewire.pengembalian.search');
    }
}
