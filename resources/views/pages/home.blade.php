@extends($layout)

@include('components.meta-title', ['title' => 'Sistem Kepegawaian'])

@section('content')
    <div class="absolute top-0 left-0 m-4 p-2 rounded shadow typewriter">
        <p class="text-lg md:text-xl font-semibold text-white typewriter-text typewriter-delete">Dinas Pekerjaan Umum dan
            Penataan Ruang</p>
    </div>
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 md:mb-4">SIMPEG</h1>
        <p class="text-base md:text-lg mb-4 md:mb-8">Selamat datang di Sistem Kepegawaian.</p>
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
            <a href="{{ route('login') }}"
                class="btn btn-primary px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 text-white">Masuk</a>
            <a href="#"
                class="btn btn-secondary px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-700 text-white">Daftar</a>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/typewriter.css') }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/typewriter.js') }}"></script>
@endpush
