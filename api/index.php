<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$appStorage = getenv('APP_STORAGE') ?: '/tmp/storage';
$bootstrapCache = $appStorage . '/bootstrap-cache';

$storageDirs = [
    $appStorage,
    $appStorage . '/app',
    $appStorage . '/framework/cache/data',
    $appStorage . '/framework/sessions',
    $appStorage . '/framework/views',
    $appStorage . '/logs',
    $bootstrapCache,
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
        throw new RuntimeException('No se pudo crear el directorio de almacenamiento: ' . $dir);
    }
}

$defaultAppKey = 'base64:3PRkO0lufwa2cEauAT8dgVUoE1UCUjD/8F+iK63HGXM=';
$defaultAppUrl = 'https://' . ($_SERVER['VERCEL_PROJECT_PRODUCTION_URL'] ?? 'practica-59p91e142-aisac1.vercel.app');

$envDefaults = [
    'APP_ENV' => getenv('APP_ENV') ?: 'production',
    'APP_DEBUG' => getenv('APP_DEBUG') ?: 'false',
    'APP_KEY' => getenv('APP_KEY') ?: $defaultAppKey,
    'APP_URL' => getenv('APP_URL') ?: $defaultAppUrl,
    'APP_STORAGE' => $appStorage,
    'VIEW_COMPILED_PATH' => $appStorage . '/framework/views',
    'APP_MAINTENANCE_DRIVER' => getenv('APP_MAINTENANCE_DRIVER') ?: 'file',
    'LOG_CHANNEL' => getenv('LOG_CHANNEL') ?: 'stderr',
    'SESSION_DRIVER' => getenv('SESSION_DRIVER') ?: 'cookie',
    'CACHE_STORE' => getenv('CACHE_STORE') ?: 'file',
    'QUEUE_CONNECTION' => getenv('QUEUE_CONNECTION') ?: 'sync',
    'FILESYSTEM_DISK' => getenv('FILESYSTEM_DISK') ?: 'local',
    // Redirige TODOS los cachés de bootstrap (paquetes, servicios, config,
    // rutas, eventos) hacia /tmp, porque bootstrap/cache/ dentro del
    // proyecto es de solo lectura en Vercel.
    'APP_PACKAGES_CACHE' => $bootstrapCache . '/packages.php',
    'APP_SERVICES_CACHE' => $bootstrapCache . '/services.php',
    'APP_CONFIG_CACHE' => $bootstrapCache . '/config.php',
    'APP_ROUTES_CACHE' => $bootstrapCache . '/routes-v7.php',
    'APP_EVENTS_CACHE' => $bootstrapCache . '/events.php',
];

foreach ($envDefaults as $key => $value) {
    putenv($key . '=' . $value);
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$request = Request::capture();
$kernel = $app->make(Kernel::class);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);