<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.meta-title', ['title' => $title ?? 'Default Title'])

    {{-- CSS Global --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- Alpine.js dan Tambahan Script --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Slot untuk custom styles --}}
    @stack('styles')
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    {{-- Navbar --}}
    @include('components.navbar')

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

    {{-- Footer --}}
    @include('components.footer')

    {{-- Global Scripts --}}
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    {{-- Slot untuk custom scripts --}}
    @stack('scripts')
</body>

</html>
