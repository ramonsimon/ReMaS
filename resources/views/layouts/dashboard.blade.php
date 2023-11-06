<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ReMaS Superior Waste Recycling</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        .button-hover:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        @media print {
            body * {
                visibility: hidden;
            }

            div.receipt, div.receipt * {
                visibility: visible;
            }

            div.receipt {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            button.print-button {
                display: none;
            }
        }
    </style>
    @livewireStyles
</head>
<body class="bg-white font-arialRoundedMTBold">

<!-- Header -->
<div class="w-full bg-white p-6 rounded-lg shadow-lg border-2 border-green-600 flex justify-between items-center mb-0">
    <!-- Logo and Title -->
    <div class="flex items-center">
        <svg height="50px" width="50px" version="1.1" id="_x35_" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g
                id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <polygon style="fill:#94A580;"
                             points="237.53,102.388 239.832,106.378 222.406,136.562 185.824,199.921 122.46,163.339 159.042,99.98 195.624,36.615 197.258,33.78 233.712,95.766 "></polygon>
                    <polygon style="fill:#7FA661;"
                             points="381.765,91.691 381.692,92.27 371.037,216.288 257.747,163.303 278.84,151.199 247.6,97.055 243.758,90.385 224.333,57.333 190.556,0 300.657,0 304.426,6.524 316.023,26.602 360.672,103.868 381.33,91.907 "></polygon>
                    <polygon style="fill:#94A580;"
                             points="399.84,334.463 395.234,334.462 377.807,304.278 341.227,240.918 404.59,204.333 441.17,267.694 477.754,331.057 479.393,333.89 407.484,334.467 "></polygon>
                    <polygon style="fill:#7FA661;"
                             points="336.953,440.363 449.404,440.359 456.943,440.364 512,345.002 407.131,345.844 399.432,345.839 336.947,345.838 336.95,321.5 234.457,393.101 336.958,464.706 "></polygon>
                    <polygon style="fill:#94A580;"
                             points="120.28,365.191 122.584,361.203 157.437,361.202 230.598,361.204 230.6,434.37 157.438,434.369 84.272,434.37 80.999,434.373 116.454,371.809 "></polygon>
                    <polygon style="fill:#7FA661;"
                             points="162.941,317.183 141.848,305.006 110.608,359.15 106.767,365.818 59.508,449.318 55.087,457.074 38.416,428.226 24.282,403.801 0,361.688 3.769,355.164 60.016,257.748 38.923,245.644 143.95,196.5 152.213,192.659 "></polygon>
                </g>
            </g></svg>
        <span class="text-darkgreen text-3xl">ReMaS Superior Waste Recycling</span>
    </div>

    <!-- User Info and Version -->
    <div class="flex items-center text-darkgreen space-x-4">
        <span>Versie: 1.0</span>
        <span>Ingelogd als {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <button @click.prevent="$root.submit();"
                    class="bg-green text-white p-2 rounded-full shadow-lg transition-transform duration-300 transform hover:scale-105">
                Uitloggen
            </button>
        </form>
    </div>


</div>

<div class="h-screen flex">
    <div x-data="{ openItem: null, openSubItem: null}" class="relative min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 h-screen bg-white shadow-md overflow-y-auto">
            <ul class="space-y-2">
                <li><a href="{{route('inname')}}" class="block px-4 py-2 hover:bg-gray-200">Inname</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Rapportage</a></li>
                <li><a href="{{route('verwerking')}}" class="block px-4 py-2 hover:bg-gray-200">Verwerking</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Uitgifte</a></li>
                <li>
                    <button @click="openItem = (openItem === 'onderhoud' ? null : 'onderhoud')"
                            class="flex justify-between w-full px-4 py-2 hover:bg-gray-200">
                        Onderhoud <span>+</span>
                    </button>
                    <ul x-show="openItem === 'onderhoud'" x-cloak class="space-y-2 pl-6">
                        <li>
                            <button @click="openSubItem = (openSubItem === 'medewerkers' ? null : 'medewerkers')"
                                    class="flex justify-between w-full px-4 py-2 hover:bg-gray-200">
                                Medewerkers <span>+</span>
                            </button>
                            <ul x-show="openSubItem === 'medewerkers'" x-cloak class="space-y-2 pl-6">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Rollen</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Gebruikers</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Gebruikers</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Rollen</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Apparaten</a></li>
                        <li><a href="{{ route('onderdelen') }}" class="block px-4 py-2 hover:bg-gray-200">Onderdelen</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <main>
            {{ $slot }}
        </main>

        @yield('content')
    </div>

</div>

@stack('modals')

@livewireScripts
</body>
</html>
