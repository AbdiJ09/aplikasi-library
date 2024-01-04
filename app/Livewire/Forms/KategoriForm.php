<?php

namespace App\Livewire\Forms;

use App\Models\Kategory;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KategoriForm extends Form
{
    #[Validate('required|min:3|unique:kategories,kode_kategory')]
    public $kode_kategory = '';
    #[Validate('required|min:3')]
    public $nama_kategory = '';

    public function store()
    {
        $this->validate();
        Kategory::create($this->all());
        $this->reset();
    }
}
