<?php

// 1. Variables de entorno forzadas
putenv('CACHE_DRIVER=array');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

$_ENV['CACHE_DRIVER'] = 'array';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['LOG_CHANNEL'] = 'stderr';


putenv('APP_PACKAGES_CACHE=/tmp/storage/framework/cache/packages.php');
putenv('APP_SERVICES_CACHE=/tmp/storage/framework/cache/services.php');

$_ENV['APP_PACKAGES_CACHE'] = '/tmp/storage/framework/cache/packages.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/storage/framework/cache/services.php';

$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/storage/framework/cache/packages.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/storage/framework/cache/services.php';

// 2. Crear carpetas en /tmp
$storageDirs = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

// 3. Resolver la raíz del proyecto de forma segura
$basePath = realpath(__DIR__ . '/..');

if (!$basePath || !file_exists($basePath . '/bootstrap/app.php')) {
    // Fallback si Vercel ejecuta desde /var/task/user directamente
    $basePath = '/var/task/user';
}

require $basePath . '/vendor/autoload.php';

$app = require_once $basePath . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

// 4. Procesar petición HTTP
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);