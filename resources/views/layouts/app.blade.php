<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.meta-title', ['title' => $title ?? 'Default Title'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    @include('components.navbar')
    @include('components.sidebar')

    <main class="container mx-auto mt-20 px-4 sm:px-6 lg:px-8">
        @yield('content')
        @include('components.footer')
    </main>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>
