<?php

// 1. Forzar variables en todos los superglobales
putenv('CACHE_DRIVER=array');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

$_ENV['CACHE_DRIVER'] = 'array';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['LOG_CHANNEL'] = 'stderr';

$_SERVER['CACHE_DRIVER'] = 'array';
$_SERVER['CACHE_STORE'] = 'array';
$_SERVER['SESSION_DRIVER'] = 'cookie';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// 2. Creación de directorios en /tmp
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

// 3. Autoload y arranque
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);