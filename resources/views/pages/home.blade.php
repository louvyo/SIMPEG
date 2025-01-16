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

            {{-- Main Title --}}
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-pulse">
                SIMPEG
            </h1>

            {{-- Description --}}
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10">
                Solusi komprehensif untuk manajemen kepegawaian yang efisien, aman, dan terintegrasi.
            </p>

            <div class="flex justify-center">
                <a href="{{ route('login') }}" aria-label="Login to the system"
                    class="group relative flex items-center justify-center gap-2 px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 transition-all duration-300 dark:bg-purple-500 dark:hover:bg-purple-600 disabled:opacity-50 min-w-[150px]">
                    {{-- Normal Content --}}
                    <div class="flex items-center gap-2">
                        <i class="fas fa-sign-in-alt text-lg"></i>
                        <span class="font-medium">Masuk ke Sistem</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <style>
        .group:hover .group-hover\:text-white {
            @apply text-white;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('login-success', () => {
                // Reset loading state after successful login
                Alpine.store('loading', false);
            });

            Livewire.on('login-error', () => {
                // Handle login error
                alert('Login failed. Please check your credentials and try again.');
                Alpine.store('loading', false);
            });
        });
    </script>
@endpush
