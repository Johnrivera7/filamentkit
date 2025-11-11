<?php

declare(strict_types=1);

return [
    'discovery' => [
        'paths' => [
            'themes' => base_path('themes'),
            'resources' => resource_path('themes'),
        ],
        'cache_duration' => (int) env('THEME_CACHE_DURATION', 3600),
        'auto_discover' => (bool) env('THEME_AUTO_DISCOVER', true),
    ],

    'installation' => [
        'allowed_sources' => ['zip', 'github', 'local'],
        'temp_directory' => storage_path('app/temp/themes'),
        'backup_existing' => true,
        'auto_enable' => false,
    ],

    'upload' => [
        'disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),
        'directory' => 'themes/uploads',
        'max_size' => 50 * 1024 * 1024,
        'allowed_extensions' => ['zip'],
    ],

    'security' => [
        'validate_theme_structure' => true,
        'scan_malicious_code' => true,
        'allowed_file_types' => [
            'php',
            'blade.php',
            'css',
            'scss',
            'js',
            'vue',
            'json',
            'md',
            'txt',
            'png',
            'jpg',
            'jpeg',
            'gif',
            'svg',
            'webp',
        ],
        'protected_themes' => ['default'],
    ],

    'preview' => [
        'enabled' => true,
        'route_prefix' => 'theme-preview',
        'session_duration' => 3600,
        'cache_screenshots' => true,
    ],

    'navigation' => [
        'register' => true,
        'sort' => 7,
        'icon' => 'heroicon-o-paint-brush',
        'group' => 'Administration',
        'label' => 'filament-themes-manager::theme.navigation.label',
    ],

    'widgets' => [
        'enabled' => true,
        'page' => true,
        'dashboard' => false,
        'widgets' => [
            \Alizharb\FilamentThemesManager\Widgets\ThemesOverview::class,
        ],
    ],

    'validation' => [
        'required_fields' => ['name', 'version', 'description'],
        'version_format' => 'semver',
        'max_name_length' => 50,
        'max_description_length' => 200,
    ],

    'performance' => [
        'cache_theme_data' => true,
        'preload_active_theme' => true,
        'compile_assets' => (bool) env('THEME_COMPILE_ASSETS', false),
        'minify_output' => (bool) env('THEME_MINIFY_OUTPUT', false),
    ],
];

