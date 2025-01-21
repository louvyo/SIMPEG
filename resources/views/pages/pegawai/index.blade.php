@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 mt-40"> <!-- Added margin-left to align with sidebar -->
        {{-- Header Manajemen Pegawai --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white">Manajemen Pegawai</h1>
                <p class="text-gray-400">Kelola data dan informasi kepegawaian</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex space-x-3">
                <button @click="openModal('tambahPegawai')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Pegawai
                </button>
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center">
                    <i class="fas fa-file-excel mr-2"></i> Export
                </button>
            </div>
        </div>

        {{-- Filter dan Pencarian --}}
        <div class="mb-6 bg-gray-800 p-4 rounded-lg">
            <div class="flex space-x-4">
                {{-- Filter Departemen --}}
                <select class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                    <option>Semua Departemen</option>
                    <option>Teknik</option>
                    <option>Administrasi</option>
                    <option>Keuangan</option>
                </select>

                {{-- Filter Status --}}
                <select class="bg-gray-700 text-white rounded-lg px-3 py-2 w-1/4">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Cuti</option>
                    <option>Non-Aktif</option>
                </select>

                {{-- Pencarian --}}
                <div class="relative flex-grow">
                    <input type="text" placeholder="Cari pegawai..."
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 pl-10">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>

        {{-- Tabel Pegawai --}}
        <div class="bg-gray-800 rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-700 text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">
                            <input type="checkbox" class="rounded bg-gray-600">
                        </th>
                        <th class="px-4 py-3 text-left">NIP</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Departemen</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $employee)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/50 transition">
                            <td class="px-4 py-3">
                                <input type="checkbox" class="rounded bg-gray-600">
                            </td>
                            <td class="px-4 py-3">{{ $employee->nip }}</td>
                            <td class="px-4 py-3 flex items-center">
                                <img src="{{ $employee->avatar }}" class="w-10 h-10 rounded-full mr-3">
                                {{ $employee->name }}
                            </td>
                            <td class="px-4 py-3">{{ $employee->department }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="
                            px-2 py-1 rounded-full text-xs
                            {{ $employee->status == 'Aktif'
                                ? 'bg-green-500/20 text-green-400'
                                : ($employee->status == 'Cuti'
                                    ? 'bg-yellow-500/20 text-yellow-400'
                                    : 'bg-red-500/20 text-red-400') }}
                        ">
                                    {{ $employee->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="text-blue-400 hover:text-blue-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-yellow-400 hover:text-yellow-300">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-400 hover:text-red-300">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="bg-gray-700 px-4 py-3 flex items-center justify-between">
                <div class="text-gray-400">
                    Menampilkan 1-10 dari 150 pegawai
                </div>
                <div class="flex space-x-2">
                    <button class="bg-gray-600 text-white px-3 py-1 rounded">Sebelumnya</button>
                    <button class="bg-blue-600 text-white px-3 py-1 rounded">Selanjutnya</button>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Pegawai --}}
        <div x-data="{ open: false }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg w-1/2 p-6">
                <h2 class="text-2xl font-bold mb-4">Tambah Pegawai Baru</h2>

                <form>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full rounded border-gray-300">
                        </div>
                        <div>
                            <label class="block mb-2">NIP</label>
                            <input type="text" class="w-full rounded border-gray-300">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                        <button type="button" @click="open = false" class="bg-red-600 text-white px-4 py-2 rounded ml-2">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(modal) {
            if (modal === 'tambahPegawai') {
                document.querySelector('[x-data]').__x.$data.open = true;
            }
        }
    </script>
@endpush
