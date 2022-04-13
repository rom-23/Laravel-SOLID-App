<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark-mode:bg-gray-800"
         x-data="{ open: false }">
        <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
            <x-admin-nav-link :href="route('admin.categories.index')"
                              :active="request()->routeIs('admin.categories.index')">
                {{ __('Categories') }}
            </x-admin-nav-link>
            <x-admin-nav-link :href="route('admin.menus.index')" :active="request()->routeIs('admin.menus.index')">
                {{ __('Menus') }}
            </x-admin-nav-link>
            <x-admin-nav-link :href="route('admin.tables.index')" :active="request()->routeIs('admin.tables.index')">
                {{ __('Tables') }}
            </x-admin-nav-link>
            <x-admin-nav-link :href="route('admin.reservations.index')"
                              :active="request()->routeIs('admin.reservations.index')">
                {{ __('Reservations') }}
            </x-admin-nav-link>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>{{ Auth::user()->name }}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main class="m-2 p-8 w-full">
        {{ $slot }}
    </main>
</div>
</body>
</html>
