<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <x-application-logo class="block w-auto text-purple-600 fill-current h-9 dark:text-purple-400" />
                    <span class="text-lg font-bold text-gray-800 dark:text-gray-200">TechBit-Blog Site</span>
                </a>
                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="mr-2 text-yellow-400 fas fa-tachometer-alt"></i> Dashboard
                    </x-nav-link>
                    <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                        <i class="mr-2 text-green-400 fas fa-plus-circle"></i> Create Post
                    </x-nav-link>
                    <x-nav-link :href="route('editpostpage')" :active="request()->routeIs('editpostpage')">
                        <i class="mr-2 text-blue-400 fas fa-edit"></i> Edit Post
                    </x-nav-link>
                    <x-nav-link :href="route('deletepostpage')" :active="request()->routeIs('deletepostpage')">
                        <i class="mr-2 text-red-400 fas fa-trash"></i> Delete Post
                    </x-nav-link>
                    <x-nav-link :href="route('poststatuspage')" :active="request()->routeIs('poststatuspage')">
                        <i class="mr-2 text-purple-400 fas fa-info-circle"></i> Post Status
                    </x-nav-link>
                    <x-nav-link :href="route('category.management')" :active="request()->routeIs('category.management')">
                        <i class="mr-2 text-indigo-400 fas fa-folder"></i> Category Management
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition bg-gray-100 border border-transparent rounded-md dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                            <i class="mr-2 text-purple-400 fas fa-user-circle"></i>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="mr-2 fas fa-user-edit"></i> {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-500 transition rounded-md dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden bg-white sm:hidden dark:bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="mr-2 text-yellow-400 fas fa-tachometer-alt"></i> Dashboard
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                <i class="mr-2 text-green-400 fas fa-plus-circle"></i> Create Post
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('editpostpage')" :active="request()->routeIs('editpostpage')">
                <i class="mr-2 text-blue-400 fas fa-edit"></i> Edit Post
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('deletepostpage')" :active="request()->routeIs('deletepostpage')">
                <i class="mr-2 text-red-400 fas fa-trash"></i> Delete Post
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('poststatuspage')" :active="request()->routeIs('poststatuspage')">
                <i class="mr-2 text-purple-400 fas fa-info-circle"></i> Post Status
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('category.management')" :active="request()->routeIs('category.management')">
                <i class="mr-2 text-indigo-400 fas fa-folder"></i> Category Management
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="mr-2 fas fa-user-edit"></i> {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
