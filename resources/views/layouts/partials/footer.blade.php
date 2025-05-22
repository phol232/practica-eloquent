{{-- resources/views/layouts/partials/footer.blade.php --}}
<footer class="bg-gray-100 border-t mt-12">
    <div class="container mx-auto py-6 px-4 text-center text-gray-600">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</p>
        <p>Este es el pie de página.</p> {{-- Como en el PDF --}}
    </div>
</footer>