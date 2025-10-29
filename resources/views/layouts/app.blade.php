<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Tailwind CDN (solo si no usas Vite para Tailwind directamente) -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="font-sans antialiased min-h-screen flex flex-col bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900 text-white">
        <div class="flex-1 flex flex-col bg-white/10 backdrop-blur-lg border border-white/20 rounded-none shadow-2xl">

            {{-- Navegación superior --}}
            @include('layouts.navigation')

            {{-- Encabezado de página --}}
            @isset($header)
                <header class="bg-white/10 border-b border-white/20 backdrop-blur-md shadow-md sticky top-16 z-40">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-purple-700">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Contenido principal --}}
            <main class="flex-1 flex items-start justify-center p-6">
                <div class="w-full max-w-7xl">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <style>
            /* Fondo animado */
            body {
                background-size: 200% 200%;
                animation: gradientShift 8s ease infinite;
            }

            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            /* Scrollbar minimalista (opcional) */
            ::-webkit-scrollbar {
                width: 8px;
            }
            ::-webkit-scrollbar-thumb {
                background-color: rgba(180, 130, 255, 0.4);
                border-radius: 10px;
            }
        </style>
    </body>
</html>
