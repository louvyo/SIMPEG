<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-gradient-to-b from-gray-800 to-gray-900 border-r border-gray-700 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto">

        <!-- Navigation Menu -->
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-3 text-gray-200 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-600 hover:bg-blue-700 shadow-lg' : '' }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-500/50 text-white' : 'bg-gray-700/50 text-gray-400' }} group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Manajemen Pegawai -->
            <li>
                <a href="{{ route('pegawai.index') }}"
                    class="flex items-center p-3 text-gray-200 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('employees.*') ? 'bg-blue-600 hover:bg-blue-700 shadow-lg' : '' }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg {{ request()->routeIs('employees.*') ? 'bg-blue-500/50 text-white' : 'bg-gray-700/50 text-gray-400' }} group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.5 17c0-.23.01-.457.03-.68a5.988 5.988 0 00-7.56 0 5.996 5.996 0 00-2.47 4.461 1 1 0 001 1.05h8a1 1 0 001-1.05c-.03-.223-.05-.45-.05-.68zM16 14a4 4 0 10-8 0 4 4 0 008 0zm2 2.75a.75.75 0 00.75-.75v-1.5a.75.75 0 00-1.5 0v1.5c0 .414.336.75.75.75z" />
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Manajemen Pegawai</span>
                </a>
            </li>

            <!-- Riwayat Cuti -->
            <li>
                <a href="{{ route('cuti.index') }}"
                    class="flex items-center p-3 text-gray-200 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('leave.*') ? 'bg-blue-600 hover:bg-blue-700 shadow-lg' : '' }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg {{ request()->routeIs('leave.*') ? 'bg-blue-500/50 text-white' : 'bg-gray-700/50 text-gray-400' }} group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Riwayat Cuti</span>
                </a>
            </li>

            <!-- Penilaian Kinerja -->
            <li>
                <a href="#"
                    class="flex items-center p-3 text-gray-200 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('performance.*') ? 'bg-blue-600 hover:bg-blue-700 shadow-lg' : '' }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg {{ request()->routeIs('performance.*') ? 'bg-blue-500/50 text-white' : 'bg-gray-700/50 text-gray-400' }} group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Penilaian Kinerja</span>
                </a>
            </li>

            <!-- Divider -->
            <div class="my-4 border-t border-gray-700/50"></div>

            <!-- Pengaturan -->
            <li>
                <a href="#"
                    class="flex items-center p-3 text-gray-200 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group {{ request()->routeIs('settings.*') ? 'bg-blue-600 hover:bg-blue-700 shadow-lg' : '' }}">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded-lg {{ request()->routeIs('settings.*') ? 'bg-blue-500/50 text-white' : 'bg-gray-700/50 text-gray-400' }} group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.532 1.532 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
