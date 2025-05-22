{{-- resources/views/layouts/partials/header.blade.php --}}
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4">
        <nav class="flex items-center justify-between py-4">
            <div>
                <a href="{{ route('welcome') }}" class="text-lg font-semibold text-gray-700">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} py-2">
                        Home
                    </a>
                </li>
                <li>
                    {{-- Asumiendo que cursos.index es la ruta principal para listar cursos --}}
                    <a href="{{ route('cursos.index') }}" class="{{ request()->routeIs('cursos.*') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} py-2">
                        Cursos
                    </a>
                </li>
                <li>
                    <a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} py-2">
                        Nosotros
                    </a>
                </li>
                <li>
                    <a href="{{ route('contactanos.index') }}" class="{{ request()->routeIs('contactanos.index') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} py-2">
                        Contáctanos
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>