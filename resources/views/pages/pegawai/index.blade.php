@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="space-y-6">
            {{-- Header Section --}}
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1
                        class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600">
                        Manajemen Pegawai
                    </h1>
                    <p class="text-gray-400 mt-2 flex items-center">
                        <i class="fas fa-users-cog mr-2 text-blue-500"></i>
                        Kelola data kepegawaian secara komprehensif dan efisien
                    </p>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('pegawai.create') }}"
                        class="btn-primary flex items-center transition-all duration-300 hover:scale-105">
                        <i class="fas fa-user-plus mr-2"></i> Tambah Pegawai Baru
                    </a>

                    <button class="btn-secondary flex items-center" x-data x-on:click="$dispatch('open-export-modal')">
                        <i class="fas fa-file-export mr-2"></i> Ekspor Data
                    </button>
                </div>
            </div>

            {{-- Statistik Cepat --}}
            <div class="grid grid-cols-4 gap-4 mb-6">
                @php
                    $stats = [
                        ['title' => 'Total Pegawai', 'value' => $totalPegawai, 'icon' => 'users', 'color' => 'blue'],
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
                        class="bg-gray-800 rounded-lg p-4 border border-gray-700 hover:border-{{ $stat['color'] }}-500 transition">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-400">{{ $stat['title'] }}</p>
                                <h3 class="text-2xl font-bold text-{{ $stat['color'] }}-500">{{ $stat['value'] }}</h3>
                            </div>
                            <div class="bg-{{ $stat['color'] }}-900/50 p-3 rounded-full">
                                <i class="fas fa-{{ $stat['icon'] }} text-{{ $stat['color'] }}-500 text-2xl"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Livewire Pegawai Table --}}
            @livewire('pegawai.pegawai-table')
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Tambahan interaksi atau logika JavaScript
    </script>
@endpush
