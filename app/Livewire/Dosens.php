<?php

namespace App\Livewire;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class Dosens extends Component
{
    use WithPagination;
    public $q;
    public $perPage = 10;

    public function render()
    {
        if (!$this->q) {
            $dosens = Dosen::Paginate($this->perPage);
        } else {
            $dosens = Dosen::where('nama_lengkap', 'like', '%' . $this->q . '%')
                ->Paginate($this->perPage);
        }
        return view('livewire.dosens', [
            'dosens' => $dosens,
        ]);
    }

    public function updatedQ(){
        $this->resetPage();
    }
}
