<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-gray-900 to-gray-800 border-b border-gray-700 shadow-lg">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <!-- Main Navbar Content -->
        <div class="flex items-center justify-between">
            <!-- Left Side: Logo & Brand -->
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-400 rounded-lg sm:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 transition-colors duration-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <img src="{{ asset('storage/assets/images/LOGO PUPR - 2023.png') }}" alt="Logo Perusahaan"
                        class="h-10 w-auto mr-3 transition-transform group-hover:scale-105 rounded-lg">
                    <span class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors">
                        SIMPEG
                    </span>
                </a>
            </div>

            <!-- Center: Search Bar with Animation -->
            <div class="flex-1 max-w-2xl mx-4 hidden md:block">
                <div class="relative group">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-400 transition-colors duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search"
                        class="block w-full p-3 ps-10 text-sm border rounded-xl bg-gray-700/50 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 backdrop-blur-sm transition-all duration-200 hover:bg-gray-700/70"
                        placeholder="Search anything..." required>
                    <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                        <kbd
                            class="hidden px-2 py-1 text-xs font-semibold text-gray-400 bg-gray-800 border border-gray-600 rounded-lg group-hover:block">
                            ⌘ K
                        </kbd>
                    </div>
                </div>
            </div>

            <!-- Right Side: Navigation & Profile -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button
                    class="relative p-2 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-600 rounded-lg transition-colors duration-200">
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <div class="absolute top-0 right-0 w-2 h-2 bg-blue-500 rounded-full"></div>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open" @click.outside="open = false"
                        class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-gray-600 transition-all duration-200"
                        aria-expanded="false">
                        <img class="w-8 h-8 rounded-lg border-2 border-gray-600 hover:border-blue-500 transition-colors duration-200"
                            src="{{ asset('storage/assets/images/profile/default-avatar.jpg') }}" alt="user photo">
                        <div class="hidden md:block text-left">
                            <p class="text-sm font-medium text-white">Neil Sims</p>
                            <p class="text-xs text-gray-400">Administrator</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Enhanced Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-60 origin-top-right">
                        <div
                            class="bg-gray-800 rounded-xl shadow-lg ring-1 ring-black ring-opacity-5 backdrop-blur-sm divide-y divide-gray-700">
                            <!-- Profile Info -->
                            <div class="p-4">
                                <div class="flex items-center space-x-3 mb-3">
                                    <img class="w-10 h-10 rounded-lg border-2 border-blue-500"
                                        src="{{ asset('storage/assets/images/profile/default-avatar.jpg') }}"
                                        alt="user photo">
                                    <div>
                                        <h4 class="text-sm font-medium text-white">Neil Sims</h4>
                                        <p class="text-xs text-gray-400">neil.sims@company.com</p>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-400 pb-2">
                                    <div class="flex items-center mb-1">
                                        <div class="w-2 h-2 rounded-full bg-green-500 mr-2"></div>
                                        Active
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Links -->
                            <div class="p-2">
                                <a href="{{ route('dashboard') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700/50 hover:text-white rounded-lg transition-colors duration-200 group">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700/50 hover:text-white rounded-lg transition-colors duration-200 group">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Settings
                                </a>
                            </div>

                            <!-- Logout Section -->
                            <div class="p-2">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-lg transition-colors duration-200 group">
                                    <svg class="w-5 h-5 mr-3 text-red-400 group-hover:text-red-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Search -->
    <div class="p-2 md:hidden">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search"
                class="block w-full p-2 ps-10 text-sm border rounded-xl bg-gray-700/50 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 backdrop-blur-sm"
                placeholder="Search anything..." required>
        </div>
    </div>
</nav>
