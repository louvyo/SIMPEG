@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/auth/building.jpg') }}'); background-size: cover;">
            <div class="relative flex items-center justify-center h-full bg-black bg-opacity-50">
<div class="absolute bottom-5 left-5 m-4 p-4 text-white md:text-left">
                    <h1 class="text-5xl font-bold">Selamat datang di Sistem Kepegawaian</h1>
                    <p class="text-lg mt-2">Kota Samarinda, Indonesia</p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 flex items-center justify-center p-4">
            <div
                class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 max-w-md bg-white bg-opacity-90 p-8 rounded-lg shadow-lg border border-gray-200 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/images/auth/logo-pupr.jpg') }}" alt="PUPR Logo" class="h-16">
                </div>
                <h1 class="text-5xl font-bold text-center mb-6 text-indigo-800">SIMPEG</h1>
                <p class="text-sm text-center text-gray-600 mb-6">Silakan daftar untuk membuat akun baru.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama *</label>
                        <div class="relative">
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105"
                                required autofocus placeholder="Masukkan nama Anda">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105"
                                required placeholder="Masukkan email Anda">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105"
                                required placeholder="Masukkan password Anda">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password *</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105"
                                required placeholder="Konfirmasi password Anda">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-blue focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Daftar
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}"
                            class="text-blue-600 hover:text-blue-500">Masuk disini</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
