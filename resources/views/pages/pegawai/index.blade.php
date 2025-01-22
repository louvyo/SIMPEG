@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="px-12 md:px-8 lg:px-12 py-6">
            {{-- Header Utama --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-9">
                    {{-- Judul Halaman --}}
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                        <div>
                            <h1
                                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 mb-3">
                                Manajemen Pegawai
                            </h1>
                            <p class="text-gray-400 flex items-center">
                                <i class="fas fa-users-cog mr-2 text-blue-500"></i>
                                Kelola data kepegawaian secara komprehensif
                            </p>
                        </div>

                        {{-- Aksi Utama --}}
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            {{-- Tombol Tambah Pegawai --}}
                            <a href="{{ route('pegawai.create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-user-plus mr-3 text-lg"></i>
                                Tambah Pegawai Baru
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            {{-- Tombol Ekspor Data --}}
                            <button
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 group"
                                x-data x-on:click="$dispatch('open-export-modal')">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-file-export mr-3 text-lg 
                      group-hover:animate-pulse"></i>
                                    Ekspor Data
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 ml-2 transform group-hover:rotate-6 
                        transition-transform duration-300"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-9.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>

                    {{-- Statistik Horizontal --}}
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        @php
                            $stats = [
                                [
                                    'title' => 'Total Pegawai',
                                    'value' => $totalPegawai,
                                    'icon' => 'users',
                                    'color' => 'blue',
                                ],
                                [
                                    'title' => 'Pegawai Aktif',
                                    'value' => $pegawaiAktif,
                                    'icon' => 'user-check',
                                    'color' => 'green',
                                ],
                                [
                                    'title' => 'Pegawai Cuti',
                                    'value' => $pegawaiCuti,
                                    'icon' => 'user-clock',
                                    'color' => 'yellow',
                                ],
                                [
                                    'title' => 'Departemen',
                                    'value' => $totalDepartemen,
                                    'icon' => 'building',
                                    'color' => 'purple',
                                ],
                            ];
                        @endphp

                        @foreach ($stats as $stat)
                            <div
                                class="bg-gray-800 rounded-lg p-4 flex items-center space-x-4 
                    border border-transparent 
                    hover:border-{{ $stat['color'] }}-500 
                    hover:bg-gray-700 
                    transform hover:scale-105 
                    transition-all duration-300 
                    cursor-pointer 
                    shadow-md hover:shadow-lg">
                                <div class="bg-{{ $stat['color'] }}-900/30 p-3 rounded-full">
                                    <i class="fas fa-{{ $stat['icon'] }} text-{{ $stat['color'] }}-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 mb-1 uppercase tracking-wider">
                                        {{ $stat['title'] }}
                                    </p>
                                    <h3
                                        class="text-xl font-bold text-{{ $stat['color'] }}-500 
                           transition-colors duration-300">
                                        {{ $stat['value'] }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Tabel Pegawai --}}
                    <div class="bg-gray-800 rounded-lg shadow-xl">
                        @livewire('pegawai.pegawai-table')
                    </div>
                </div>

                {{-- Sidebar Informasi --}}
                <div class="md:col-span-9 hidden md:block">
                    <div class="space-y-6">
                        {{-- Quick Actions --}}
                        <div class="bg-gray-800 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-white mb-4">
                                <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                                Aksi Cepat
                            </h3>
                            <div class="space-y-3">
                                <button class="w-full btn-primary flex items-center justify-center">
                                    <i class="fas fa-file-upload mr-2"></i>
                                    Import Data
                                </button>
                                <button class="w-full btn-secondary flex items-center justify-center">
                                    <i class="fas fa-print mr-2"></i>
                                    Cetak Laporan
                                </button>
                            </div>
                        </div>

                        {{-- Notifikasi --}}
                        <div class="bg-gray-800 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-white mb-4">
                                <i class="fas fa-bell text-red-500 mr-2"></i>
                                Notifikasi
                            </h3>
                            <div class="space-y-3">
                                <div class="bg-gray-700 p-3 rounded-lg">
                                    <p class="text-sm text-gray-300">
                                        3 pegawai akan habis masa kontrak
                                    </p>
                                </div>
                                <div class="bg-gray-700 p-3 rounded-lg">
                                    <p class="text-sm text-gray-300">
                                        Pembaruan data kepegawaian tersedia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Tambahan interaksi atau logika JavaScript
    </script>
@endpush
