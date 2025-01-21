@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Side - Login Form (30%) -->
        <div class="w-full md:w-2/5 flex items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-white">
            <div
                class="w-full max-w-md bg-white p-10 rounded-3xl shadow-2xl border border-gray-100 
                        transition duration-500 ease-in-out transform hover:scale-105 hover:shadow-3xl">

                <!-- Logo and Title Section -->
                <div class="text-center space-y-4 mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/LOGO PUPR - 2023.png') }}" alt="PUPR Logo"
                            class="h-24 w-auto object-contain shadow-md 
                                    transition duration-500 hover:rotate-6 hover:scale-110">
                    </div>
                    <div>
                        <h1 class="text-4xl font-extrabold text-blue-900 tracking-tight mb-2">SIMPEG</h1>
                        <p class="text-sm text-gray-600 font-medium">Sistem Informasi Manajemen Kepegawaian</p>
                    </div>
                </div>

                <!-- Admin Access Message -->
                <div class="text-red-500 text-center mb-4">
                    <p>Only admin users can log in.</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-semibold text-gray-700 flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i>Email
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email" required autofocus
                                class="w-full px-4 py-3 pl-10 rounded-xl border border-gray-300 
                                          focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                          transition duration-300 ease-in-out transform hover:scale-102 
                                          bg-gray-50 focus:bg-white @error('email') border-red-500 @enderror"
                                placeholder="nama@email.com">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-semibold text-gray-700 flex items-center">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 pl-10 rounded-xl border border-gray-300 
                                          focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                          transition duration-300 ease-in-out transform hover:scale-102 
                                          bg-gray-50 focus:bg-white @error('password') border-red-500 @enderror"
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            @error('password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-gray-600">Ingat saya</span>
                        </label>
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-blue-600 hover:text-blue-800 transition duration-300">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-blue-700 
                                   text-white font-bold rounded-xl shadow-lg 
                                   transition duration-500 ease-in-out transform 
                                   hover:scale-105 hover:shadow-xl 
                                   focus:outline-none focus:ring-2 focus:ring-blue-500 
                                   flex items-center justify-center space-x-2 
                                   group">
                        <span>Masuk</span>
                        <i class="fas fa-sign-in-alt ml-2 transition group-hover:translate-x-1"></i>
                    </button>
                </form>

                <!-- Register Link Removed -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        <!-- Registration Link Removed -->
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Background Image (70%) -->
        {{-- <div class="hidden md:block md:w-7/12 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('assets/images/auth/skyscrapers-from-low-angle-view.jpg') }}'); 
                background-size: cover; 
                background-position: center;
                filter: brightness(60%) contrast(120%) saturate(110%);">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-blue-500/30 
                    flex items-end">
                    <div class="p-16 text-white max-w-3xl">
                        <h2
                            class="text-5xl font-bold leading-tight mb-6 
                           transform transition duration-500 hover:scale-105">
                            Transformasi Digital Kepegawaian
                        </h2>
                        <p class="text-2xl text-gray-200 transform transition duration-500 hover:scale-105">
                            Efisiensi, Transparansi, dan Akuntabilitas
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
