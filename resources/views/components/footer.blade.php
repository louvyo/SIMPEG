<!-- footer.blade.php -->
<div
    class="fixed bottom-0 left-0 right-0 bg-gray-800 border-t border-gray-700 shadow-md py-4 z-50">
    <div class="container-fluid px-4 flex justify-center items-center">
        <div class="text-sm text-gray-300">
            <p>&copy; {{ date('Y') }} Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda</p>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#"
                class="text-gray-400 hover:text-blue-400 transition flex items-center">
                <i class="fas fa-question-circle mr-2"></i>
                <span class="hidden md:inline">Bantuan</span>
            </a>
            <a href="#"
                class="text-gray-400 hover:text-blue-400 transition flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                <span class="hidden md:inline">Kontak</span>
            </a>
        </div>
    </div>
</div>

{{-- Tambahan CSS untuk padding --}}
<style>
    body {
        padding-bottom: 60px; /* Sesuaikan dengan tinggi footer */
    }
</style>
