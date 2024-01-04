<?php

namespace App\Livewire;

use App\Livewire\Forms\KategoriForm;
use Livewire\Component;

class AddKategory extends Component
{
    public KategoriForm $form;

    public function save()
    {

        $this->form->store();
        $this->dispatch('kategory-added', $this->form);
        $this->dispatch('close-modal');
        session()->flash('status', "Kategori {$this->form->nama_kategory} ditambahkan");
    }
    public function render()
    {
        return view('livewire.add-kategory');
    }
}
