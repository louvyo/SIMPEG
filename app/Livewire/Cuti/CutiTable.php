<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cuti;
use Carbon\Carbon;

class CutiTable extends Component
{
    use WithPagination;

    // Properti untuk search dan filter
    public $search = '';
    public $status = '';
    public $jenis_cuti = '';
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';

    // Properti sorting
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    // Reset pagination ketika filter berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingJenisCuti()
    {
        $this->resetPage();
    }

    // Method untuk sorting
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortBy = $field;
    }

    // Reset semua filter
    public function resetFilters()
    {
        $this->reset([
            'search',
            'status',
            'jenis_cuti',
            'tanggal_mulai',
            'tanggal_selesai'
        ]);
    }

    public function render()
    {
        // Query dasar dengan eager loading
        $query = Cuti::with('pegawai')
            // Filter pencarian
            ->when($this->search, function ($q) {
                return $q->whereHas('pegawai', function ($subQuery) {
                    $subQuery->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('nip', 'like', '%' . $this->search . '%');
                });
            })
            // Filter status
            ->when($this->status, function ($q) {
                return $q->where('status', $this->status);
            })
            // Filter jenis cuti
            ->when($this->jenis_cuti, function ($q) {
                return $q->where('jenis_cuti', $this->jenis_cuti);
            })
            // Filter tanggal
            ->when($this->tanggal_mulai && $this->tanggal_selesai, function ($q) {
                return $q->whereBetween('tanggal_mulai', [
                    Carbon::parse($this->tanggal_mulai),
                    Carbon::parse($this->tanggal_selesai)
                ]);
            })
            // Sorting
            ->orderBy($this->sortBy, $this->sortDirection);

        // Ambil data dengan pagination
        $cutis = $query->paginate(10);

        // Konversi tanggal untuk setiap data
        $cutis->transform(function ($cuti) {
            $cuti->tanggal_mulai = Carbon::parse($cuti->tanggal_mulai);
            $cuti->tanggal_selesai = Carbon::parse($cuti->tanggal_selesai);
            return $cuti;
        });

        return view('livewire.cuti.cuti-table', [
            'cutis' => $cutis,
            // Tambahan data untuk dropdown
            'statusOptions' => ['Proses', 'Disetujui', 'Ditolak'],
            'jenisCutiOptions' => [
                'Cuti Tahunan',
                'Cuti Besar',
                'Cuti Khusus',
                'Cuti Sakit',
                'Cuti Melahirkan'
            ]
        ]);
    }
}
