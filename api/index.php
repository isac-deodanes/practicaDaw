<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$appStorage = getenv('APP_STORAGE') ?: '/tmp/storage';
$storageDirs = [
    $appStorage,
    $appStorage . '/app',
    $appStorage . '/framework/cache/data',
    $appStorage . '/framework/sessions',
    $appStorage . '/framework/views',
    $appStorage . '/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
        throw new RuntimeException('No se pudo crear el directorio de almacenamiento: ' . $dir);
    }
}

putenv('APP_ENV=' . (getenv('APP_ENV') ?: 'production'));
putenv('APP_DEBUG=' . (getenv('APP_DEBUG') ?: 'false'));
putenv('APP_STORAGE=' . $appStorage);
putenv('VIEW_COMPILED_PATH=' . $appStorage . '/framework/views');
putenv('APP_MAINTENANCE_DRIVER=' . (getenv('APP_MAINTENANCE_DRIVER') ?: 'file'));
putenv('LOG_CHANNEL=' . (getenv('LOG_CHANNEL') ?: 'stderr'));
putenv('SESSION_DRIVER=' . (getenv('SESSION_DRIVER') ?: 'file'));
putenv('CACHE_STORE=' . (getenv('CACHE_STORE') ?: 'file'));
putenv('QUEUE_CONNECTION=' . (getenv('QUEUE_CONNECTION') ?: 'sync'));
putenv('FILESYSTEM_DISK=' . (getenv('FILESYSTEM_DISK') ?: 'local'));

$_ENV['APP_ENV'] = getenv('APP_ENV') ?: 'production';
$_ENV['APP_DEBUG'] = getenv('APP_DEBUG') ?: 'false';
$_ENV['APP_STORAGE'] = $appStorage;
$_ENV['VIEW_COMPILED_PATH'] = $appStorage . '/framework/views';
$_ENV['APP_MAINTENANCE_DRIVER'] = getenv('APP_MAINTENANCE_DRIVER') ?: 'file';
$_ENV['LOG_CHANNEL'] = getenv('LOG_CHANNEL') ?: 'stderr';
$_ENV['SESSION_DRIVER'] = getenv('SESSION_DRIVER') ?: 'file';
$_ENV['CACHE_STORE'] = getenv('CACHE_STORE') ?: 'file';
$_ENV['QUEUE_CONNECTION'] = getenv('QUEUE_CONNECTION') ?: 'sync';
$_ENV['FILESYSTEM_DISK'] = getenv('FILESYSTEM_DISK') ?: 'local';

$_SERVER['APP_ENV'] = getenv('APP_ENV') ?: 'production';
$_SERVER['APP_DEBUG'] = getenv('APP_DEBUG') ?: 'false';
$_SERVER['APP_STORAGE'] = $appStorage;
$_SERVER['VIEW_COMPILED_PATH'] = $appStorage . '/framework/views';
$_SERVER['APP_MAINTENANCE_DRIVER'] = getenv('APP_MAINTENANCE_DRIVER') ?: 'file';
$_SERVER['LOG_CHANNEL'] = getenv('LOG_CHANNEL') ?: 'stderr';
$_SERVER['SESSION_DRIVER'] = getenv('SESSION_DRIVER') ?: 'file';
$_SERVER['CACHE_STORE'] = getenv('CACHE_STORE') ?: 'file';
$_SERVER['QUEUE_CONNECTION'] = getenv('QUEUE_CONNECTION') ?: 'sync';
$_SERVER['FILESYSTEM_DISK'] = getenv('FILESYSTEM_DISK') ?: 'local';

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