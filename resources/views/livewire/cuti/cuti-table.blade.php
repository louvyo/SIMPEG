<div>
    {{-- Filter Section --}}
    <div class="bg-gray-800 p-4 rounded-lg mb-6 border border-gray-700">
        <div class="flex space-x-4 items-center">
            {{-- Pencarian --}}
            <div class="relative flex-grow">
                <input type="text" wire:model.live="search" placeholder="Nama/NIP Pegawai"
                    class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 pl-10 border border-gray-600">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>

            {{-- Filter Jenis Cuti --}}
            <select wire:model.live="jenis_cuti" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                <option value="">Semua Jenis</option>
                @foreach ($jenisCutiOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            {{-- Filter Status --}}
            <select wire:model.live="status" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                <option value="">Semua Status</option>
                @foreach ($statusOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            {{-- Tombol Aksi --}}
            <button wire:click="resetFilters" class="btn-secondary flex items-center">
                <i class="fas fa-sync mr-2"></i> Reset
            </button>
        </div>
    </div>

    {{-- Tabel Riwayat Cuti --}}
    <div class="bg-gray-800 rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('pegawai.nama')">
                        Pegawai
                        @if ($sortBy === 'pegawai.nama')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('jenis_cuti')">
                        Jenis Cuti
                        @if ($sortBy === 'jenis_cuti')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('tanggal_mulai')">
                        Tanggal Mulai
                        @if ($sortBy === 'tanggal_mulai')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('tanggal_selesai')">
                        Tanggal Selesai
                        @if ($sortBy === 'tanggal_selesai')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('status')">
                        Status
                        @if ($sortBy === 'status')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cutis as $cuti)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/50 transition">
                        <td class="px-4 py-3">{{ $cuti->pegawai->nama }}</td>
                        <td class="px-4 py-3">{{ $cuti->jenis_cuti }}</td>
                        <td>{{ $cuti->tanggal_mulai->format('d M Y') }}</td>
                        <td>{{ $cuti->tanggal_selesai->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs {{ $cuti->status == 'Disetujui' ? 'bg-green-500/20 text-green-400' : ($cuti->status == 'Ditolak' ? 'bg-red-500/20 text-red-400' : 'bg-yellow-500/20 text-yellow-400') }}">
                                {{ $cuti->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('cuti.show', $cuti->id) }}"
                                    class="text-blue-400 hover:text-blue-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cuti.edit', $cuti->id) }}"
                                    class="text-yellow-400 hover:text-yellow-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">
                            Tidak ada data cuti
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="bg-gray-700 px-4 py-3 flex items-center justify-between">
            <div class="text-gray-400">
                Menampilkan {{ $cutis->firstItem() }}-{{ $cutis->lastItem() }} dari {{ $cutis->total() }} cuti
            </div>
            <div class="flex space-x-2">
                {{ $cutis->links() }}
            </div>
        </div>
    </div>
</div>
