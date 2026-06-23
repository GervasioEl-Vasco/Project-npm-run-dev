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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @php
                $isAdminOrStaff = in_array(Auth::user()?->role, ['admin', 'staff']);
            @endphp

            <div class="mx-auto flex w-full max-w-7xl gap-6 px-4 py-6 sm:px-6 lg:px-8">
                <div class="hidden w-64 shrink-0 lg:block">
                    @if ($isAdminOrStaff)
                        <x-sidebar-admin />
                    @else
                        <x-sidebar-customer />
                    @endif
                </div>

                <div class="min-w-0 flex-1">
                    @isset($header)
                        <header class="mb-6">
                            {{ $header }}
                        </header>
                    @endisset

                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
