<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @stack('styles')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @livewireStyles
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    {{-- Navbar --}}
    @include('components.navbar', ['user' => Auth::user()])

    <div class="flex flex-1">
        {{-- Sidebar (optional, bisa dikontrol) --}}
        @hasSection('sidebar')
            @yield('sidebar')
        @else
            @include('components.sidebar')
        @endif

        {{-- Main Content Area --}}
        <main class="flex-grow p-4 ml-64 mt-20"> {{-- ml-64 untuk mengakomodasi sidebar --}}
            @yield('content')
        </main>
    </div>

    {{-- Footer
    @include('components.footer') --}}

    {{-- Global Scripts --}}
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    {{-- Slot untuk custom scripts --}}
    @stack('scripts')

    @livewireScripts
</body>

</html>
