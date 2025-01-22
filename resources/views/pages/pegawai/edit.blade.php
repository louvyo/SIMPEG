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
                        <h1 class="text-3xl font-bold text-white">Edit Profil Pegawai</h1>
                        <p class="text-blue-200 mt-2">Perbarui informasi {{ $pegawai->nama }}</p>
                    </div>

                    {{-- Profile Avatar --}}
                    <div class="relative">
                        <img src="{{ $pegawai->avatar ? asset('storage/' . $pegawai->avatar) : asset('default-avatar.png') }}"
                            alt="{{ $pegawai->nama }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        <span
                            class="absolute bottom-0 right-0 block h-8 w-8 
                            {{ $pegawai->status == 'Aktif' ? 'bg-green-500' : ($pegawai->status == 'Cuti' ? 'bg-yellow-500' : 'bg-red-500') }} 
                            border-4 border-white rounded-full"></span>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <form x-ref="form" action="{{ route('pegawai.update', $pegawai->id) }}" method="POST"
                enctype="multipart/form-data" class="p-8 space-y-6">
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

                {{-- Personal Information --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- NIP --}}
                    <div>
                        <label class="block text-white mb-2">Nomor Induk Pegawai</label>
                        <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-white mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>
                </div>

                {{-- Contact Information --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Email --}}
                    <div>
                        <label class="block text-white mb-2">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $pegawai->email) }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>

                    {{-- No Telepon --}}
                    <div>
                        <label class="block text-white mb-2">Nomor Telepon</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon', $pegawai->no_telepon) }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2">
                    </div>
                </div>

                {{-- Additional Information --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Bidang --}}
                    <div>
                        <label class="block text-white mb-2">Bidang</label>
                        <select name="bidang_id" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                            <option value="">Pilih Bidang</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}"
                                    {{ old('bidang_id', $pegawai->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                    {{ $bidang->nama_bidang }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-white mb-2">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>
                </div>

                {{-- Status dan Tanggal --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Status Pegawai --}}
                    <div>
                        <label class="block text-white mb-2">Status Pegawai</label>
                        <select name="status" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                            <option value="">Pilih Status</option>
                            <option value="Aktif" {{ old('status', $pegawai->status) == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="Cuti" {{ old('status', $pegawai->status) == 'Cuti' ? 'selected' : '' }}>
                                Cuti
                            </option>
                            <option value="Non-Aktif"
                                {{ old('status', $pegawai->status) == 'Non-Aktif' ? 'selected' : '' }}>
                                Non-Aktif
                            </option>
                        </select>
                    </div>

                    {{-- Tanggal Masuk --}}
                    <div>
                        <label class="block text-white mb-2">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk ? \Carbon\Carbon::parse($pegawai->tanggal_masuk)->format('Y-m-d') : '') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                    </div>
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-white mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                {{-- Avatar Upload Section --}}
                <div>
                    <label class="block text-white mb-2">Foto Profil</label>
                    <div class="flex items-center space-x-4">
                        @if ($pegawai->avatar)
                            <img src="{{ asset('storage/' . $pegawai->avatar) }}" alt="Avatar"
                                class="w-20 h-20 rounded-full object-cover border-2 border-primary-600 shadow-lg">
                        @endif
                        <input type="file" name="avatar" class="input-dark" accept="image/*">
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('pegawai.index') }}"
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
