@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 h-screen p-4">
            <div class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 max-w-md bg-white bg-opacity-90 p-8 rounded-lg shadow-lg border border-gray-200 transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/images/auth/logo-pupr.jpg') }}" alt="PUPR Logo" class="h-16">
                </div>
                <h1 class="text-3xl font-bold text-center mb-6 text-indigo-600">SIMPEG</h1>
                <h2 class="text-lg text-center mb-4 text-gray-700">Selamat datang di Sistem Kepegawaian</h2>
                <p class="text-sm text-center text-gray-600 mb-6">Dinas Pekerjaan Umum dan Penataan Ruang</p>
                <p class="text-sm text-center text-gray-600 mb-6">
                    Sebelum memulai, anda harus masuk terlebih dahulu dengan akun anda.
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105"
                            required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out transform hover:scale-105"
                            required>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">Ingat Saya</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Lupa
                            Password?</a>
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105">
                        Masuk
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Belum verifikasi email? <a href="#" class="text-indigo-600 hover:text-indigo-500">Verifikasi
                            sekarang</a>
                    </p>
                    <p class="text-sm text-gray-600">
                        Belum punya akun? <a href="#" class="text-indigo-600 hover:text-indigo-500">Daftar disini</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-cover bg-center h-screen"
             style="background-image: url('{{ $_stisla_bg_login }}'); background-size: cover; background-position: center;">
            <div class="relative flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="absolute bottom-5 left-5 m-4 text-white text-center md:text-left">
                    <h1 class="text-5xl font-bold">{{ $city }}, {{ $country }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
