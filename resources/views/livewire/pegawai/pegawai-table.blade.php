<div>
    {{-- Filter Section --}}
    <div class="bg-gray-800 p-4 rounded-lg mb-6 border border-gray-700">
        <div class="flex space-x-4 items-center">
            {{-- Pencarian --}}
            <div class="relative flex-grow">
                <input wire:model.live="search" type="text" placeholder="Cari pegawai (NIP/Nama/Email)..."
                    class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 pl-10 border border-gray-600">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>

            {{-- Filter Bidang --}}
            <select wire:model.live="bidang" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                <option value="">Semua Departemen</option>
                @foreach ($bidangs as $bidang)
                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                @endforeach
            </select>

            {{-- Filter Status --}}
            <select wire:model.live="status" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                <option value="">Semua Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Cuti">Cuti</option>
                <option value="Non-Aktif">Non-Aktif</option>
            </select>

            {{-- Tombol Aksi --}}
            <button wire:click="resetFilters" class="btn-secondary flex items-center">
                <i class="fas fa-sync mr-2"></i> Reset
            </button>
        </div>
    </div>

    {{-- Tabel Pegawai --}}
    <div class="bg-gray-800 rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('nip')">
                        NIP
                        @if ($sortBy === 'nip')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left cursor-pointer" wire:click="sortBy('nama')">
                        Nama
                        @if ($sortBy === 'nama')
                            <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="px-4 py-3 text-left">Departemen</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pegawais as $pegawai)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/50 transition">
                        <td class="px-4 py-3">{{ $pegawai->nip }}</td>
                        <td class="px-4 py-3 flex items-center">
                            <img src="{{ $pegawai->avatar_url }}" class="w-10 h-10 rounded-full mr-3 object-cover">
                            {{ $pegawai->nama }}
                        </td>
                        <td class="px-4 py-3">{{ $pegawai->bidang->nama_bidang ?? 'Tidak ada Bidang' }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs
                                {{ $pegawai->status == 'Aktif'
                                    ? 'bg-green-500/20 text-green-400'
                                    : ($pegawai->status == 'Cuti'
                                        ? 'bg-yellow-500/20 text-yellow-400'
                                        : 'bg-red-500/20 text-red-400') }}">
                                {{ $pegawai->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('pegawai.show', $pegawai->id) }}"
                                    class="text-blue-400 hover:text-blue-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}"
                                    class="text-yellow-400 hover:text-yellow-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                        <td colspan="5" class="text-center text-gray-500 py-4">
                            Tidak ada data pegawai
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="bg-gray-700 px-4 py-3 flex items-center justify-between">
            <div class="text-gray-400">
                Menampilkan {{ $pegawais->firstItem() }}-{{ $pegawais->lastItem() }} dari {{ $pegawais->total() }}
                pegawai
            </div>
            <div class="flex space-x-2">
                {{ $pegawais->links() }}
            </div>
        </div>
    </div>
</div>
