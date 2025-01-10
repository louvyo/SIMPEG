<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.meta-title', ['title' => $title ?? 'Default Title'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body class="bg-gray-900 text-white h-screen">
    <main class="flex flex-col items-center justify-center h-full">
        @yield('content')
        @include('components.footer')
    </main>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    @stack('scripts')
</body>

</html>
