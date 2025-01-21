@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold text-white mb-6">
                Tambah Pegawai Baru
            </h1>

            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-white mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('nama') border-red-500 @enderror"
                            required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-white mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('email') border-red-500 @enderror"
                            required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- Bidang --}}
                    <div>
                        <label class="block text-white mb-2">Bidang</label>
                        <select name="bidang_id"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('bidang_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Bidang</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>
                                    {{ $bidang->nama_bidang }}
                                </option>
                            @endforeach
                        </select>
                        @error('bidang_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-white mb-2">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('jabatan') border-red-500 @enderror"
                            required>
                        @error('jabatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- Tanggal Masuk --}}
                    <div>
                        <label class="block text-white mb-2">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('tanggal_masuk') border-red-500 @enderror"
                            required>
                        @error('tanggal_masuk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-white mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('jenis_kelamin') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    {{-- No Telepon --}}
                    <div>
                        <label class="block text-white mb-2">No Telepon</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('no_telepon') border-red-500 @enderror">
                        @error('no_telepon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Avatar --}}
                    <div>
                        <label class="block text-white mb-2">Foto Profil</label>
                        <input type="file" name="avatar"
                            class="w-full bg-gray-700 text-white rounded-lg px-4 py-2 @error('avatar') border-red-500 @enderror"
                            accept="image/*">
                        @error('avatar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('pegawai.index') }}"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
