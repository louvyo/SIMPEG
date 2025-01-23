@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="px-12 md:px-8 lg:px-12 py-6">
            {{-- Flash Message Component --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                    class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-xl flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Header Utama --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-9">
                    {{-- Judul Halaman --}}
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                        <div>
                            <h1
                                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 mb-3">
                                Riwayat Cuti Pegawai
                            </h1>
                            <p class="text-gray-400 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                Kelola dan pantau riwayat cuti seluruh pegawai
                            </p>
                        </div>

                        {{-- Aksi Utama --}}
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <a href="{{ route('cuti.create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <i class="fas fa-plus-circle mr-3 text-lg"></i>
                                Ajukan Cuti Baru
                            </a>
                        </div>
                    </div>

                    {{-- Statistik Horizontal --}}
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        @php
                            $stats = [
                                [
                                    'title' => 'Total Cuti',
                                    'value' => $totalCuti,
                                    'icon' => 'calendar-check',
                                    'color' => 'blue',
                                ],
                                [
                                    'title' => 'Cuti Disetujui',
                                    'value' => $cutiDisetujui,
                                    'icon' => 'check-circle',
                                    'color' => 'green',
                                ],
                                [
                                    'title' => 'Cuti Ditolak',
                                    'value' => $cutiDitolak,
                                    'icon' => 'times-circle',
                                    'color' => 'red',
                                ],
                                [
                                    'title' => 'Cuti Proses',
                                    'value' => $cutiProses,
                                    'icon' => 'hourglass',
                                    'color' => 'yellow',
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

                    {{-- Tabel Riwayat Cuti --}}
                    <div class="bg-gray-800 rounded-lg shadow-xl">
                        @livewire('cuti.cuti-table')
                    </div>
                </div>

                {{-- Sidebar Informasi --}}
                <div class="md:col-span-9 hidden md:block">
                    <div class="space-y-6">
                        {{-- Sisa Cuti --}}
                        <div class="bg-gray-800 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-white mb-4">
                                <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                                Sisa Cuti
                            </h3>
                            <div class="bg-gray-700 rounded-lg p-4">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-300">Cuti Tahunan</span>
                                    <span class="font-bold text-green-500">12 Hari</span>
                                </div>
                                <div class="w-full bg-gray-600 rounded-full h-2.5">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Penting --}}
                        <div class="bg-gray-800 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-white mb-4">
                                <i class="fas fa-info-circle text-yellow-500 mr-2"></i>
                                Informasi Penting
                            </h3>
                            <div class="bg-gray-700 p-4 rounded-lg text-sm text-gray-300 space-y-2">
                                <p>
                                    <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i>
                                    Batas Pengajuan Cuti: 31 Desember 2023
                                </p>
                                <p>
                                    <i class="fas fa-calendar-check text-green-400 mr-2"></i>
                                    Periode Cuti: Januari - Desember
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
