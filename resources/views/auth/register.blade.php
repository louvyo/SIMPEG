@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="w-full md:w-1/3 flex items-center justify-center bg-gray-100 h-full md:h-screen"
            style="background-image: url('{{ $_stisla_bg_login }}'); background-size: cover; background-position: center;">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h1 class="text-2xl font-bold text-center mb-4">Sistem Kepegawaian</h1>
                <h2 class="text-lg text-center mb-2">Selamat datang di Sistem Kepegawaian</h2>
                <p class="text-sm text-center text-gray-600 mb-6">Dinas Pekerjaan Umum dan Penataan Ruang</p>
                <p class="text-sm text-center text-gray-600 mb-6">Silakan daftar untuk membuat akun baru.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama *</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Daftar</button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}"
                            class="text-indigo-600 hover:text-indigo-500">Masuk disini</a></p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-2/3 bg-cover bg-center h-full md:h-screen" style="background-image: url('{{ $_stisla_bg_login }}');">
            <div class="flex items-center justify-center h-full">
                <div class="text-light p-5 pb-2">
                    <div class="mb-5 pb-3">
                        <h1 class="mb-2 display-4 font-weight-bold" id="sapaan">{{ __('Selamat Datang') }}</h1>
                        <h5 class="font-weight-normal text-muted-transparent">
                            {{ $_city }},
                            {{ $_country }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
