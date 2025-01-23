@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            {{-- Header Profil --}}
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 p-6">
                <div class="flex items-center space-x-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">{{ $cuti->pegawai->nama }}</h1>
                        <p class="text-blue-200">{{ $cuti->jenis_cuti }}</p>
                    </div>
                </div>
            </div>

            {{-- Konten Detail --}}
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-4">Informasi Cuti</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Tanggal Mulai</span>
                                <span class="text-white">
                                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Tanggal Selesai</span>
                                <span class="text-white">
                                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Jumlah Hari</span>
                                <span class="text-white">{{ $cuti->jumlah_hari }} Hari</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Alasan</span>
                                <span class="text-white">{{ $cuti->alasan }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-700 pb-2">
                                <span class="text-gray-400">Status</span>
                                <span class="text-white">{{ $cuti->status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
