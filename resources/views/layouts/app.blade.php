<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.meta-title', ['title' => $title ?? 'Default Title'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    {{-- Head content --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">
    @include('components.navbar')

    <div class="flex flex-1">
        @include('components.sidebar')

        <main class="flex-grow p-4">
            @yield('content')
            @include('components.footer')
        </main>
    </div>
    @stack('scripts')
</body>

</html>
