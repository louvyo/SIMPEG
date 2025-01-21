@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            {{-- Header Profil --}}
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 p-6">
                <div class="flex items-center space-x-6">
                    {{-- Foto Profil --}}
                    <div class="flex-shrink-0">
                        <img src="{{ $pegawai->avatar_url }}" alt="{{ $pegawai->nama }}"
                            class="w-32 h-32 rounded-full border-4 border-white object-cover">
                    </div>

                    {{-- Informasi Dasar --}}
                    <div>
                        <h1 class="text-3xl font-bold text-white">{{ $pegawai->nama }}</h1>
                        <p class="text-blue-200">{{ $pegawai->jabatan }} - {{ $pegawai->bidang->nama_bidang }}</p>

                        {{-- Status Kepegawaian --}}
                        <div class="mt-2">
                            <span
                                class="
                            px-3 py-1 rounded-full text-sm 
                            {{ $pegawai->status == 'Aktif'
                                ? 'bg-green-500 text-white'
                                : ($pegawai->status == 'Cuti'
                                    ? 'bg-yellow-500 text-white'
                                    : 'bg-red-500 text-white') }}
                        ">
                                {{ $pegawai->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigasi Detail --}}
            <div class="bg-gray-700 px-6 py-4">
                <div class="flex justify-between items-center">
                    <nav class="flex space-x-4">
                        <button class="text-white hover:text-blue-300 font-semibold">
                            Profil
                        </button>
                        <button class="text-gray-400 hover:text-white">
                            Riwayat Pekerjaan
                        </button>
                        <button class="text-gray-400 hover:text-white">
                            Dokumen
                        </button>
                    </nav>

                    <div class="flex space-x-3">
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center">
                                <i class="fas fa-trash mr-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Konten Detail --}}
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    {{-- Informasi Pribadi --}}
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-4">Informasi Pribadi</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">NIP</span>
                                <span class="text-white">{{ $pegawai->nip }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Email</span>
                                <span class="text-white">{{ $pegawai->email }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Jenis Kelamin</span>
                                <span class="text-white">{{ $pegawai->jenis_kelamin }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">No Telepon</span>
                                <span class="text-white">{{ $pegawai->no_telepon ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Informasi Pekerjaan --}}
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-4">Informasi Pekerjaan</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Bidang</span>
                                <span class="text-white">{{ $pegawai->bidang->nama_bidang }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Jabatan</span>
                                <span class="text-white">{{ $pegawai->jabatan }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Tanggal Masuk</span>
                                <span class="text-white">
                                    {{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Masa Kerja</span>
                                <span class="text-white">
                                    {{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
