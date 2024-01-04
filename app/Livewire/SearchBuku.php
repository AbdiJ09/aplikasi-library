<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;

class SearchBuku extends Component
{
    #[Url(as: 'q')]
    public $query;
    public $bukus;
    public bool $boxSearch = false;

    public function render()
    {
        $this->bukus = [];
        $this->bukus = Buku::where('judul', 'like', '%' . $this->query . '%')->take(10)->orderBy('judul', 'asc')->limit(10)->get();

        return view('livewire.search-buku');
    }
    public function showBuku($slug)
    {
        $this->redirect(route('detail-buku', $slug), navigate: true);
        $this->boxSearch = false;
    }

    public function handleEnter()
    {
        $this->redirect('/result?q=' . $this->query, navigate: true);
    }
}
