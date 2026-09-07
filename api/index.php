<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

$maintenancePath = $appStorage . '/framework/maintenance.php';
if (file_exists($maintenancePath)) {
    require $maintenancePath;
}

require __DIR__ . '/../vendor/autoload.php';

try {
    $app = require __DIR__ . '/../bootstrap/app.php';
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    echo "<h1>Error Fatal Capturado:</h1>";
    echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Archivo:</strong> " . htmlspecialchars($e->getFile()) . " en línea " . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    exit;
}

$publicIndex = dirname(__DIR__) . '/public/index.php';
if (!file_exists($publicIndex)) {
    die("Error fatal: No se encuentra el archivo en la ruta: " . $publicIndex);
}

require $publicIndex;