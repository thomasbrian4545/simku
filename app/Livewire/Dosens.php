<?php

namespace App\Livewire;

use App\Models\Dosen;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Dosens extends Component
{
    use WithPagination;
    public $q;
    public $perPage = 10;

    public $dosen;
    public $formTitle;
    public $formEdit = false;
    #[Rule('required')]
    public $nama_lengkap;

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

    public function updatedQ()
    {
        $this->resetPage();
    }

    public function save()
    {
        Dosen::create($this->validate());
        $this->reset();
        session()->flash('status', 'Dosen berhasil ditambahkan.');
    }

    #[On('reset-modal')]
    public function close()
    {
        $this->reset();
    }

    #[On('edit-mode')]
    public function edit($id)
    {
        $this->formEdit = true;
        $this->formTitle = 'Edit';
        $this->dosen = Dosen::findOrfail($id);
        $this->nama_lengkap = $this->dosen->nama_lengkap;
    }

    public function update()
    {
        Dosen::findOrFail($this->dosen->id)->update($this->validate());
        $this->reset();
        session()->flash('status', 'Dosen berhasil diedit.');
    }
}
