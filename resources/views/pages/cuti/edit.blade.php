@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
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

        <div x-data="{
            isSubmitting: false,
            submit() {
                this.isSubmitting = true;
                this.$refs.form.submit();
            }
        }" class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            {{-- Header Section --}}
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Edit Pengajuan Cuti</h1>
                        <p class="text-blue-200 mt-2">Perbarui informasi cuti pegawai</p>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <form x-ref="form" action="{{ route('cuti.update', $cuti->id) }}" method="POST" enctype="multipart/form-data"
                class="p-8 space-y-6">
                @csrf
                @method('PUT')

                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Informasi Cuti --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Pegawai --}}
                    <div>
                        <label class="block text-white mb-2">Pegawai</label>
                        <select name="pegawai_id" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" disabled>
                            <option value="{{ $cuti->pegawai_id }}">{{ $cuti->pegawai->nama }}</option>
                            {{-- Jika Anda ingin menampilkan pegawai lain, Anda bisa menambahkan opsi lain di sini, tetapi tetap menonaktifkan dropdown --}}
                        </select>
                        <input type="hidden" name="pegawai_id" value="{{ $cuti->pegawai_id }}">
                    </div>


                    {{-- Jenis Cuti --}}
                    <div>
                        <label class="block text-white mb-2">Jenis Cuti</label>
                        <select name="jenis_cuti" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <option value="Cuti Tahunan" {{ $cuti->jenis_cuti == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti
                                Tahunan</option>
                            <option value="Cuti Besar" {{ $cuti->jenis_cuti == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar
                            </option>
                            <option value="Cuti Khusus" {{ $cuti->jenis_cuti == 'Cuti Khusus' ? 'selected' : '' }}>Cuti
                                Khusus</option>
                            <option value="Cuti Sakit" {{ $cuti->jenis_cuti == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit
                            </option>
                            <option value="Cuti Melahirkan" {{ $cuti->jenis_cuti == 'Cuti Melahirkan' ? 'selected' : '' }}>
                                Cuti Melahirkan</option>
                        </select>
                    </div>
                </div>

                {{-- Tanggal Cuti --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-white mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" value="{{ $cuti->tanggal_mulai->format('Y-m-d') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label class="block text-white mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" value="{{ $cuti->tanggal_selesai->format('Y-m-d') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>
                </div>

                {{-- Alasan Cuti --}}
                <div>
                    <label class="block text-white mb-2">Alasan Cuti</label>
                    <textarea name="alasan" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" rows="4" required>{{ $cuti->alasan }}</textarea>
                </div>

                {{-- Status Cuti --}}
                <div>
                    <label class="block text-white mb-2">Status Cuti</label>
                    <select name="status" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                        <option value="Proses" {{ $cuti->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                {{-- Dokumen Pendukung --}}
                <div>
                    <label class="block text-white mb-2">Dokumen Pendukung (optional)</label>
                    <input type="file" name="dokumen_pendukung"
                        class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" accept="application/pdf,image/*">
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('cuti.index') }}"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                        Batal
                    </a>
                    <button type="submit" :disabled="isSubmitting"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        <span x-show="!isSubmitting">Simpan Perubahan</span>
                        <span x-show="isSubmitting">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
