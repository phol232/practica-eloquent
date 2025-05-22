{{-- resources/views/emails/contactanos.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['asunto'] ?? 'Mensaje de Contacto' }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #0056b3; /* Azul del PDF */ }
        p { margin-bottom: 1em; }
        strong { font-weight: bold; }
        .footer { margin-top: 20px; text-align: center; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $data['asunto'] }}</h1>
        <p>Has recibido un nuevo mensaje a través del formulario de contacto:</p>
        <hr>
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Correo Electrónico:</strong> <a href="mailto:{{ $data['correo'] }}">{{ $data['correo'] }}</a></p>
        <p><strong>Mensaje:</strong></p>
        <p>{!! nl2br(e($data['mensaje'])) !!}</p>
        <hr>
        <div class="footer">
            <p>Este correo fue enviado desde el formulario de contacto de {{ config('app.name') }}.</p>
        </div>
    </div>
</body>
</html>