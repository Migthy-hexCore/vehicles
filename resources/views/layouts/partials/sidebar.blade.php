@php
    $links = [
        //Dashboard
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-chart-line',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Super Administración
        [
            'header' => 'Super Administración',
            'role' => ['super admin'],
        ],

        //usuarios y roles
        [
            'name' => 'Usuarios y roles',
            'icon' => 'fa-solid fa-users-cog',
            'route' => route('users.index'),
            'active' => request()->routeIs('users.*'),
            'role' => ['super admin'],
        ],

        //Asignaciones
        [
            'header' => 'Asignaciones',
            'role' => ['super admin', 'admin', 'user'],
        ],
        [
            'name' => 'Asignaciones',
            'icon' => 'fa-solid fa-clipboard-list',
            'route' => route('assignments.index'),
            'active' => request()->routeIs('assignments.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //administración vehicular
        [
            'header' => 'Administración vehicular',
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Vehículos
        [
            'name' => 'Vehículos',
            'icon' => 'fa-solid fa-car',
            'route' => route('vehicles.index'),
            'active' => request()->routeIs('vehicles.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Sociedades
        [
            'name' => 'Sociedades',
            'icon' => 'fa-solid fa-landmark',
            'route' => route('societies.index'),
            'active' => request()->routeIs('societies.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Divisiones
        [
            'name' => 'Divisiones',
            'icon' => 'fa-solid fa-building',
            'route' => route('divisions.index'),
            'active' => request()->routeIs('divisions.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Agencias
        [
            'name' => 'Agencias',
            'icon' => 'fa-solid fa-building-flag',
            'route' => route('agencies.index'),
            'active' => request()->routeIs('agencies.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Marcas
        [
            'name' => 'Marcas',
            'icon' => 'fa-solid fa-tags',
            'route' => route('brands.index'),
            'active' => request()->routeIs('brands.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //administración de usuarios
        [
            'header' => 'Administración de usuarios',
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Usuarios
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('employees.index'),
            'active' => request()->routeIs('employees.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //niveles de usuario
        [
            'name' => 'Niveles de usuario',
            'icon' => 'fa-solid fa-signal',
            'route' => route('levels.index'),
            'active' => request()->routeIs('levels.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Dependencias
        [
            'name' => 'Dependencias',
            'icon' => 'fa-solid fa-address-book',
            'route' => route('dependencies.index'),
            'active' => request()->routeIs('dependencies.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Direcciones generales
        [
            'name' => 'Direcciones generales',
            'icon' => 'fa-solid fa-sitemap',
            'route' => route('directions.index'),
            'active' => request()->routeIs('directions.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],

        //Áreas
        [
            'name' => 'Areas',
            'icon' => 'fa-solid fa-people-carry-box',
            'route' => route('areas.index'),
            'active' => request()->routeIs('areas.*'),
            'role' => ['super admin', 'admin', 'user'],
        ],
    ];
@endphp

<div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        :class="{
            'translate-x-0': sidebarOpen,
            '-translate-x-full ease-in': !sidebarOpen
        }"
        aria-label="Sidebar">

        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                @foreach ($links as $link)
                    @if (!isset($link['role']) || auth()->user()->hasrole($link['role']))
                        <li>
                            @isset($link['header'])
                                <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-300">
                                    {{ $link['header'] }}
                                </div>
                            @else
                                <a href="{{ $link['route'] }}"
                                    class="flex items-center mt-2 p-2 rounded-lg group text-gray-900 dark:text-white hover:bg-indigo-200 dark:hover:bg-gray-700 
                                            {{ $link['active'] ? 'bg-indigo-300 text-white dark:bg-slate-500' : '' }}">
                                    <span>
                                        <i class="inline-flex w-6 h-6 justify-center items-center">
                                            <i
                                                class="{{ $link['icon'] }} text-indigo-600 dark:text-indigo-300 {{ $link['active'] ? 'text-white' : '' }}"></i>
                                        </i>
                                    </span>
                                    <span class="ml-2">{{ $link['name'] }}</span>
                                </a>
                            @endisset
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </aside>
