<?php

// Forzar variables críticas en todos los entornos para serverless
putenv('QUEUE_CONNECTION=sync');
putenv('CACHE_STORE=array');
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');

$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['CACHE_DRIVER'] = 'array';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['LOG_CHANNEL'] = 'stderr';

$_SERVER['QUEUE_CONNECTION'] = 'sync';
$_SERVER['CACHE_STORE'] = 'array';
$_SERVER['CACHE_DRIVER'] = 'array';
$_SERVER['SESSION_DRIVER'] = 'cookie';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// Crear directorios temporales
$dirs = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

$base = dirname(__DIR__);

require $base . '/vendor/autoload.php';

$app = require_once $base . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);