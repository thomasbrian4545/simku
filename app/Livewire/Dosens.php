<?php

namespace App\Livewire;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class Dosens extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dosens',[
            'dosens'=>Dosen::paginate(5)
        ]);
    }
}
