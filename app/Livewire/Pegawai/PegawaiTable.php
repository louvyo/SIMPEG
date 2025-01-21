<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pegawai;
use App\Models\Bidang; // Import the Bidang model
use Illuminate\Support\Facades\Log;

class PegawaiTable extends Component
{
    use WithPagination;

    public $search = '';
    public $bidang = '';
    public $status = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public function render()
    {
        $query = Pegawai::query()
            ->when($this->search, function ($q) {
                return $q->where(function ($subq) {
                    $subq->where('nip', 'like', '%' . $this->search . '%')
                        ->orWhere('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->bidang, fn($q) => $q->where('bidang_id', $this->bidang))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->orderBy($this->sortBy, $this->sortDirection);

        $pegawais = $query->paginate(10);
        $bidangs = Bidang::all();

        return view('livewire.pegawai.pegawai-table', [
            'pegawais' => $pegawais,
            'bidangs' => $bidangs
        ]);
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? ($this->sortDirection == 'asc' ? 'desc' : 'asc')
            : 'asc';
        $this->sortBy = $field;
    }

    public function resetFilters()
    {
        $this->reset(['search', 'bidang', 'status']);
    }
}
