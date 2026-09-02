<?php

// 1. Forzar variables para caché, sesiones y manifiestos a /tmp
$defaultEnv = [
    'CACHE_DRIVER' => 'array',
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
    'APP_PACKAGES_CACHE' => '/tmp/storage/framework/cache/packages.php',
    'APP_SERVICES_CACHE' => '/tmp/storage/framework/cache/services.php',
    'APP_CONFIG_CACHE' => '/tmp/storage/framework/cache/config.php',
    'APP_ROUTES_CACHE' => '/tmp/storage/framework/cache/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/storage/framework/cache/events.php',
];

foreach ($defaultEnv as $key => $value) {
    $current = getenv($key);
    if ($current === false || $current === '') {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

// 2. Crear carpetas en /tmp
$storageDirs = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/storage/framework/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

// 3. Cargar la app
$basePath = dirname(__DIR__);

require $basePath . '/vendor/autoload.php';

$app = require_once $basePath . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);