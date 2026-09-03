<?php

// Forzar variables críticas en todos los entornos para serverless
putenv('APP_MAINTENANCE_DRIVER=file');
putenv('QUEUE_CONNECTION=sync');
putenv('CACHE_STORE=array');
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=database');
putenv('LOG_CHANNEL=stderr');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('SESSION_DRIVER=database');
putenv('SESSION_SECURE_COOKIE=true');

$_ENV['APP_MAINTENANCE_DRIVER'] = 'file';
$_ENV['QUEUE_CONNECTION'] = 'sync';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['CACHE_DRIVER'] = 'array';
$_ENV['SESSION_DRIVER'] = 'database';
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['SESSION_DRIVER'] = 'database';
$_ENV['SESSION_SECURE_COOKIE'] = 'true';

$_SERVER['APP_MAINTENANCE_DRIVER'] = 'file';
$_SERVER['QUEUE_CONNECTION'] = 'sync';
$_SERVER['CACHE_STORE'] = 'array';
$_SERVER['CACHE_DRIVER'] = 'array';
$_SERVER['SESSION_DRIVER'] = 'database';
$_SERVER['LOG_CHANNEL'] = 'stderr';
$_SERVER['SESSION_DRIVER'] = 'database';
$_SERVER['SESSION_SECURE_COOKIE'] = 'true';

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

$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

require __DIR__ . '/../public/index.php';

$base = dirname(__DIR__);

require $base . '/vendor/autoload.php';

$app = require_once $base . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

// 2. Forzar valores de configuración directamente en el Config Repository
$app->booted(function ($app) {
    $config = $app->make('config');
    $config->set('session.driver', 'cookie');
    $config->set('cache.default', 'array');
    $config->set('queue.default', 'sync');
});

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);