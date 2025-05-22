<html>
<body>
    <h1>¡Gracias por tu mensaje, {{ $datos['nombre'] ?? 'Usuario' }}!</h1>
    <p>Hemos recibido tu mensaje y pronto responderemos:</p>
    <p>{{ $datos['mensaje'] ?? '' }}</p>
</body>
</html>