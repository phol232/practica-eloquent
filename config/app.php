<?php

return [

    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'timezone' => 'UTC',

    // ✅ Idioma principal de la aplicación
    'locale' => env('APP_LOCALE', 'es'),

    // ✅ Idioma alternativo en caso de fallo
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // ✅ Idioma para Faker (factories)
    'faker_locale' => env('APP_FAKER_LOCALE', 'es_ES'),

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
