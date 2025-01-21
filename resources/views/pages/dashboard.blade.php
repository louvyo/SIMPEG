@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        {{-- Header Dashboard --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                <p class="text-sm text-gray-400">
                    Selamat datang, {{ Auth::user()->name }} - Overview sistem Anda
                </p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex space-x-3">
                <button
                    class="btn btn-primary flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> Tambah Baru
                </button>
                <button
                    class="btn btn-outline-secondary flex items-center border border-gray-600 text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    <i class="fas fa-download mr-2"></i> Laporan
                </button>
            </div>
        </div>

        {{-- Grid Statistik Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            @php
                $statsCards = [
                    [
                        'title' => 'Total Karyawan',
                        'value' => '1,234',
                        'icon' => 'users',
                        'color' => 'blue',
                        'trend' => 'up',
                        'trendValue' => 12.5,
                        'details' => [
                            ['name' => 'Bidang Teknik', 'count' => 456, 'percentage' => 37],
                            ['name' => 'Bidang Infrastruktur', 'count' => 378, 'percentage' => 30],
                            ['name' => 'Bidang Tata Ruang', 'count' => 400, 'percentage' => 33],
                        ],
                    ],
                    [
                        'title' => 'Pengajuan Cuti',
                        'value' => '18',
                        'icon' => 'calendar-times',
                        'color' => 'yellow',
                        'trend' => 'up',
                        'trendValue' => 8.2,
                        'details' => [
                            ['name' => 'Menunggu Persetujuan', 'count' => 12, 'percentage' => 66],
                            ['name' => 'Ditolak', 'count' => 4, 'percentage' => 22],
                            ['name' => 'Diproses', 'count' => 2, 'percentage' => 12],
                        ],
                    ],
                    [
                        'title' => 'Karyawan Cuti',
                        'value' => '42',
                        'icon' => 'calendar-check',
                        'color' => 'green',
                        'trend' => 'down',
                        'trendValue' => 5.3,
                        'details' => [
                            ['name' => 'Cuti Tahunan', 'count' => 28, 'percentage' => 66],
                            ['name' => 'Cuti Besar', 'count' => 10, 'percentage' => 24],
                            ['name' => 'Cuti Khusus', 'count' => 4, 'percentage' => 10],
                        ],
                    ],
                    [
                        'title' => 'Kinerja Pegawai',
                        'value' => '86.5%',
                        'icon' => 'chart-line',
                        'color' => 'purple',
                        'trend' => 'up',
                        'trendValue' => 15.7,
                        'details' => [
                            ['name' => 'Sangat Baik', 'count' => 320, 'percentage' => 26],
                            ['name' => 'Baik', 'count' => 600, 'percentage' => 48],
                            ['name' => 'Cukup', 'count' => 314, 'percentage' => 26],
                        ],
                    ],
                ];
            @endphp

            @foreach ($statsCards as $card)
                <div x-data="{ showDetails: false }"
                    class="bg-gray-800 rounded-2xl shadow-lg p-5 border border-gray-700 hover:border-{{ $card['color'] }}-500 transition transform hover:scale-105 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-{{ $card['color'] }}-500"></div>

                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-400 mb-2">{{ $card['title'] }}</h3>
                            <div class="flex items-center">
                                <p class="text-2xl font-bold text-{{ $card['color'] }}-400 mr-3">{{ $card['value'] }}</p>
                                <span
                                    class="flex items-center 
                                {{ $card['trend'] == 'up' ? 'text-green-500' : 'text-red-500' }}">
                                    <i class="fas fa-{{ $card['trend'] == 'up' ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                                    {{ $card['trendValue'] }}%
                                </span>
                            </div>
                        </div>
                        <div class="bg-{{ $card['color'] }}-900/50 p-3 rounded-full">
                            <i class="fas fa-{{ $card['icon'] }} text-{{ $card['color'] }}-500 text-xl"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        @foreach ($card['details'] as $detail)
                            <div class="w-full bg-gray-700 rounded-full h-2.5 mb-1">
                                <div class="bg-{{ $card['color'] }}-500 h-2.5 rounded-full"
                                    style="width: {{ $detail['percentage'] }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400">
                                <span>{{ $detail['name'] }}</span>
                                <span>{{ $detail['count'] }} ({{ $detail['percentage'] }}%)</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Area Utama Dashboard --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            {{-- Grafik Analitik --}}
            <div class="md:col-span-8 bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-white">Analitik Performa Kepegawaian</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded-lg bg-blue-700 text-white">7 Hari</button>
                        <button class="px-3 py-1 rounded-lg bg-gray-700 text-gray-300">30 Hari</button>
                    </div>
                </div>

                {{-- Kontainer Chart --}}
                <div id="performanceChart" class="h-[400px] w-full"></div>
            </div>

            {{-- Aktivitas Terkini --}}
            <div class="md:col-span-8 bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-white">Aktivitas Terkini</h2>
                    <button class="text-sm text-gray-400 hover:text-white transition">
                        Lihat Semua
                    </button>
                </div>

                <div class="space-y-4">
                    @php
                        $activities = [
                            [
                                'icon' => 'user-plus',
                                'action' => 'Pengguna baru terdaftar',
                                'details' => 'Neil Sims bergabung',
                                'time' => '2 menit lalu',
                                'color' => 'green',
                                'badge' => 'Baru',
                            ],
                            [
                                'icon' => 'file-upload',
                                'action' => 'Dokumen diunggah',
                                'details' => 'Laporan kinerja Q2 2023',
                                'time' => '15 menit lalu',
                                'color' => 'blue',
                                'badge' => 'Dokumen',
                            ],
                            [
                                'icon' => 'bell',
                                'action' => 'Notifikasi Cuti',
                                'details' => 'Pengajuan cuti disetujui',
                                'time' => '1 jam lalu',
                                'color' => 'yellow',
                                'badge' => 'Cuti',
                            ],
                            [
                                'icon' => 'chart-line',
                                'action' => 'Penilaian Kinerja',
                                'details' => 'Evaluasi bulanan selesai',
                                'time' => '3 jam lalu',
                                'color' => 'purple',
                                'badge' => 'Kinerja',
                            ],
                        ];
                    @endphp

                    @foreach ($activities as $activity)
                        <div
                            class="flex items-center space-x-4 bg-gray-700 p-3 rounded-lg hover:bg-gray-600 transition group">
                            {{-- Ikon Aktivitas --}}
                            <div class="flex-shrink-0">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center 
                        bg-{{ $activity['color'] }}-900/50">
                                    <i
                                        class="fas fa-{{ $activity['icon'] }} text-{{ $activity['color'] }}-500 text-lg"></i>
                                </div>
                            </div>

                            {{-- Konten Aktivitas --}}
                            <div class="flex-grow">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4
                                            class="text-sm font-medium text-white group-hover:text-{{ $activity['color'] }}-400 transition">
                                            {{ $activity['action'] }}
                                        </h4>
                                        <p class="text-xs text-gray-400">
                                            {{ $activity['details'] }}
                                        </p>
                                    </div>

                                    {{-- Badge --}}
                                    <span
                                        class="text-xs px-2 py-1 rounded-full 
                            bg-{{ $activity['color'] }}-500/20 
                            text-{{ $activity['color'] }}-400">
                                        {{ $activity['badge'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Waktu --}}
                            <div class="text-xs text-gray-500">
                                {{ $activity['time'] }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Statistik Aktivitas --}}
                <div class="mt-6 bg-gray-700 rounded-lg p-4">
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div>
                            <p class="text-sm text-gray-400">Total</p>
                            <p class="text-lg font-bold text-white">42</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Hari Ini</p>
                            <p class="text-lg font-bold text-green-500">12</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Belum Dibaca</p>
                            <p class="text-lg font-bold text-yellow-500">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah ApexCharts tersedia
            if (typeof ApexCharts !== 'undefined') {
                var options = {
                    series: [{
                        name: 'Kinerja',
                        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                    }, {
                        name: 'Produktivitas',
                        data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                    }],
                    chart: {
                        type: 'line',
                        height: 400,
                        background: 'transparent',
                        foreColor: '#ffffff',
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#3B82F6', '#10B981'],
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    grid: {
                        borderColor: 'rgba(255,255,255,0.1)',
                        strokeDashArray: 5
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',
                            'Nov', 'Des'
                        ]
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: '100%'
                            }
                        }
                    }]
                };

                try {
                    var chart = new ApexCharts(document.getElementById('performanceChart'), options);
                    chart.render();
                    console.log('Chart berhasil dirender');
                } catch (error) {
                    console.error('Gagal membuat chart:', error);
                }
            } else {
                console.error('ApexCharts tidak tersedia');
            }
        });
    </script>
@endpush
