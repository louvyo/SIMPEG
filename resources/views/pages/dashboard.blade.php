@extends('layouts.app')

@section('content')
    <div class="min-h-screen w-full flex flex-col overflow-hidden relative bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900">
        {{-- Main Content Container --}}
        <div class="relative z-10 flex-grow flex flex-col items-center justify-center px-4 py-8 text-center">
            {{-- Dashboard Title --}}
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
                Dashboard
            </h1>

            {{-- Dashboard Description --}}
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10">
                Welcome to your dashboard! Here you can manage your settings and view your information.
            </p>

            {{-- Additional Dashboard Content --}}
            <div class="dashboard-content">
                <!-- Add dashboard-specific content here -->
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush
