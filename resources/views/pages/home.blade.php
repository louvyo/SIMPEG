@extends('layouts.app-blank')

@section('content')
    <div
        class="min-h-screen w-full flex flex-col overflow-hidden relative bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900">
        {{-- Particle Background --}}
        <div id="particles-js" class="absolute inset-0 z-0"></div>

        {{-- Main Content Container --}}
        <div class="relative z-10 flex-grow flex flex-col items-center justify-center px-4 py-8 text-center">
            {{-- Logo --}}
            <div class="mb-8">
                <img src="{{ asset('assets/images/auth/logo-pupr.jpg') }}" alt="Logo PUPR"
                    class="h-24 w-24 md:h-32 md:w-32 mx-auto rounded-full shadow-2xl ring-4 ring-white/20">
            </div>

            {{-- Judul Utama --}}
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-pulse">
                SIMPEG
            </h1>

            {{-- Deskripsi --}}
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10">
                Solusi komprehensif untuk manajemen kepegawaian yang efisien, aman, dan terintegrasi.
            </p>

            {{-- Tombol Aksi --}}
            <div class="auth-button-container">
                <a href="{{ route('login') }}" class="btn-masuk">
                    <i class="fas fa-sign-in-alt btn-icon"></i>
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="btn-daftar">
                    <i class="fas fa-user-plus btn-icon"></i>
                    Daftar
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush
