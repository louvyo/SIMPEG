@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
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
                        <h1 class="text-3xl font-bold text-white">Ajukan Cuti Baru</h1>
                        <p class="text-blue-200 mt-2">Lengkapi informasi cuti pegawai</p>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <form x-ref="form" action="{{ route('cuti.store') }}" method="POST" enctype="multipart/form-data"
                class="p-8 space-y-6">
                @csrf

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
                        <select name="pegawai_id" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                            <option value="">Pilih Pegawai</option>
                            @foreach ($pegawais as $pegawai)
                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Cuti --}}
                    <div>
                        <label class="block text-white mb-2">Jenis Cuti</label>
                        <select name="jenis_cuti" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <option value="Cuti Tahunan">Cuti Tahunan</option>
                            <option value="Cuti Besar">Cuti Besar</option>
                            <option value="Cuti Khusus">Cuti Khusus</option>
                            <option value="Cuti Sakit">Cuti Sakit</option>
                            <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        </select>
                    </div>
                </div>

                {{-- Tanggal Cuti --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-white mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label class="block text-white mb-2">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>
                </div>

                {{-- Alasan Cuti --}}
                <div>
                    <label class="block text-white mb-2">Alasan Cuti</label>
                    <textarea name="alasan" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" rows="4" required></textarea>
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
                        <span x-show="!isSubmitting">Ajukan Cuti</span>
                        <span x-show="isSubmitting">Mengajukan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
