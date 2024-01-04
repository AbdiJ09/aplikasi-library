<?php

namespace App\Livewire;

use Livewire\Component;

class BreadCrumb extends Component
{
    public $detail;
    public function render()
    {
        return view('livewire.bread-crumb');
    }
}
