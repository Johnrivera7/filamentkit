<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | Forzamos el driver a `single` porque el driver `raw` generaba rutas
    | duplicadas (p. ej. `<path>/<path>/laravel.log`) en macOS, impidiendo que
    | el visor encontrara correctamente `storage/logs/laravel.log`.
    |
    */
    'driver' => 'single',

    /*
    |--------------------------------------------------------------------------
    | Resource configuration
    |--------------------------------------------------------------------------
    */
    'resource' => [
        'slug' => 'logs',
        'cluster' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Log files storage path
    |--------------------------------------------------------------------------
    */
    'storage_path' => storage_path('logs'),
];

