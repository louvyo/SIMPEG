@extends('layouts.app-blank')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')
    <div x-data="{
        pageLoaded: false,
        init() {
            document.documentElement.classList.add('js');
            setTimeout(() => {
                this.pageLoaded = true;
            }, 100);
        }
    }"
        class="min-h-screen w-full flex flex-col overflow-hidden relative bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900">
        {{-- Particle Background --}}
        <div id="particles-js" class="absolute inset-0 z-0"></div>

        {{-- Fallback untuk Non-JavaScript --}}
        <noscript>
            <div
                class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900 z-50 flex items-center justify-center text-white text-center p-4">
                <p>
                    Mohon aktifkan JavaScript untuk menggunakan aplikasi ini dengan optimal.
                    <br>
                    Beberapa fitur mungkin tidak berfungsi tanpa JavaScript.
                </p>
            </div>
        </noscript>

        {{-- Main Content Container --}}
        <div x-show="pageLoaded" x-transition:enter="page-enter-active" x-transition:enter-start="page-enter"
            class="relative z-10 flex-grow flex flex-col items-center justify-center px-4 py-8 text-center page-content">
            {{-- Logo --}}
            <div class="mb-8" x-show="pageLoaded" x-transition:enter.duration.600ms>
                <img src="{{ asset('assets/images/auth/logo-pupr.jpg') }}" alt="Logo PUPR"
                    class="h-24 w-24 md:h-32 md:w-32 mx-auto rounded-full shadow-2xl ring-4 ring-white/20 
                           transition-all duration-500 transform hover:scale-110 hover:rotate-6">
            </div>

            {{-- Main Title --}}
            <h1 x-show="pageLoaded" x-transition:enter.duration.800ms.delay.200ms
                class="text-4xl md:text-6xl font-bold text-white mb-4 animate-pulse">
                SIMPEG
            </h1>

            {{-- Description --}}
            <p x-show="pageLoaded" x-transition:enter.duration.1000ms.delay.400ms
                class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10 
                       transition-all duration-500 hover:text-white">
                Solusi komprehensif untuk manajemen kepegawaian yang efisien, aman, dan terintegrasi.
            </p>

            {{-- Login Button --}}
            <div x-show="pageLoaded" x-transition:enter.duration.1200ms.delay.600ms class="flex justify-center">
                <a href="{{ route('login') }}" aria-label="Login to the system"
                    class="group relative flex items-center justify-center gap-2 px-6 py-3 
                           bg-purple-600 text-white rounded-lg 
                           hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 
                           transition-all duration-300 
                           dark:bg-purple-500 dark:hover:bg-purple-600 
                           disabled:opacity-50 
                           min-w-[150px] 
                           transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-sign-in-alt text-lg mr-2"></i>
                    <span class="font-medium">Masuk ke Sistem</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush
