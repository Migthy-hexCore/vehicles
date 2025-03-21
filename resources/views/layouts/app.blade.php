@props(['breadcrumbs' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/b92993069a.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-700" x-data="{
    sidebarOpen: false,
}"
    :class="{
        'overflow-y-hidden': sidebarOpen
    }">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none;" x-show="sidebarOpen"
        x-on:click="sidebarOpen = false">
    </div>
    @include('layouts.partials.navigation')
    @include('layouts.partials.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-28">
            <div class="flex justify-between items-center">
                @include('layouts.partials.breadcrumb')
                @isset($action)
                    <div class="text-gray-900 dark:text-white">
                        {{ $action }}
                    </div>
                @endisset
            </div>
            <div
                class="p-4 mt-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white dark:bg-gray-300">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @stack('js')

    @if (@session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>

</body>

</html>
