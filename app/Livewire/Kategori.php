<?php

namespace App\Livewire;

use App\Models\Kategory;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Kategori extends Component
{
    use WithPagination;
    #[On('kategory-added')]
    public function updatingKategori($value)
    {
    }
    public function delete($id)
    {
        $kategory = Kategory::findOrFail($id);
        $kategory->delete();
    }
    public function render()
    {
        return view('livewire.kategori', [
            'kategoris' => Kategory::paginate(10),
        ]);
    }
}
