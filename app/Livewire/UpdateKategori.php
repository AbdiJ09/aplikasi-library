<?php

namespace App\Livewire;

use App\Models\Kategory;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateKategori extends Component
{
    public $data;
    #[Validate('required|max:5')]
    public $kode_kategory = '';
    #[Validate('required|min:3')]
    public $nama_kategory = '';
    public function mount($data)
    {
        $this->data = $data;
        $this->kode_kategory = $data->kode_kategory;
        $this->nama_kategory = $data->nama_kategory;
    }
    public function update($id)
    {
        $this->validate();
        $kategory = Kategory::find($id);
        if ($kategory) {
            $kategory->update([
                'kode_kategory' => $this->kode_kategory,
                'nama_kategory' => $this->nama_kategory
            ]);
            return $this->redirect('/dashboard/kategori', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.update-kategori');
    }
}
