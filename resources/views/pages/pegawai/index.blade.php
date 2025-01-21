@extends('layouts.app')

@section('content')
    <div class="w-full max-w-full mx-auto px-4 py-8">
        <div class="space-y-6">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Manajemen Pegawai</h1>
                    <p class="text-gray-400">Kelola data dan informasi kepegawaian</p>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('pegawai.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Pegawai
                    </a>
                </div>
            </div>

            {{-- Filter dan Pencarian --}}
            <form action="{{ route('pegawai.index') }}" method="GET" class="mb-6 bg-gray-800 p-4 rounded-lg">
                <div class="flex space-x-4 items-center">
                    {{-- Pencarian --}}
                    <div class="relative flex-grow">
                        <input type="text" name="search" placeholder="Cari pegawai (NIP/Nama/Email)..."
                            value="{{ request('search') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 pl-10">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    {{-- Filter Bidang --}}
                    <select name="bidang" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                        <option value="">Semua Departemen</option>
                        @foreach ($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ request('bidang') == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama_bidang }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Filter Status --}}
                    <select name="status" class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                        <option value="">Semua Status</option>
                        <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ request('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Non-Aktif" {{ request('status') == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif
                        </option>
                    </select>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>

                    {{-- Tombol Reset --}}
                    <a href="{{ route('pegawai.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-sync mr-2"></i>Reset
                    </a>
                </div>
            </form>

            {{-- Tabel Pegawai --}}
            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-700 text-gray-300">
                        <tr>
                            <th class="px-4 py-3 text-left">NIP</th>
                            <th class="px-4 py-3 text-left">Nama</th>
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
                                        class="
                                    px-2 py-1 rounded-full text-xs
                                    {{ $pegawai->status == 'Aktif'
                                        ? 'bg-green-500/20 text-green-400'
                                        : ($pegawai->status == 'Cuti'
                                            ? 'bg-yellow-500/20 text-yellow-400'
                                            : 'bg-red-500/20 text-red-400') }}
                                ">
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
                        Menampilkan {{ $pegawais->firstItem() }}-{{ $pegawais->lastItem() }} dari
                        {{ $pegawais->total() }} pegawai
                    </div>
                    <div class="flex space-x- 2">
                        {{ $pegawais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
