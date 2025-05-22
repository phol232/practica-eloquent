{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Vite para Tailwind CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <div class="flex flex-col min-h-screen">
        @include('layouts.partials.header')

        <main class="flex-grow container mx-auto px-4 py-8">
            {{-- Mensajes de sesión (éxito/error) --}}
            @if (session('success_message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Éxito</p>
                    <p>{{ session('success_message') }}</p>
                </div>
            @endif
            @if (session('error_message'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error_message') }}</p>
                </div>
            @endif
            {{-- El layout que proveíste ya tenía un mensaje de 'success', lo adapté --}}

            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
    @stack('scripts')
</body>
</html>