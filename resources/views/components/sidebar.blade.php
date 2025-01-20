<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-gray-800 border-r border-gray-700 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">
        <ul class="space-y-2 font-medium">
            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Manajemen Pegawai --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group {{ request()->routeIs('employees.*') ? 'bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.5 17c0-.23.01-.457.03-.68a5.988 5.988 0 00-7.56 0 5.996 5.996 0 00-2.47 4.461 1 1 0 001 1.05h8a1 1 0 001-1.05c-.03-.223-.05-.45-.05-.68zM16 14a4 4 0 10-8 0 4 4 0 008 0zm2 2.75a.75.75 0 00.75-.75v-1.5a.75.75 0 00-1.5 0v1.5c0 .414.336.75.75.75z" />
                    </svg>
                    <span class="ms-3">Manajemen Pegawai</span>
                </a>
            </li>

            {{-- Riwayat Cuti --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group {{ request()->routeIs('leave.*') ? 'bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">Riwayat Cuti</span>
                </a>
            </li>

            {{-- Penilaian Kinerja --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group {{ request()->routeIs('performance.*') ? 'bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                    <span class="ms-3">Penilaian Kinerja</span>
                </a>
            </li>

            {{-- Pengaturan --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group {{ request()->routeIs('settings.*') ? 'bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.532 1.532 0 01.947-2.287c1.561-.379 1.561-2.6 0 ```php
                        2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 15a5 5 0 100-10 5 5 0 000 10z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
