<?php

// Mostrar errores en pantalla si PHP crashea
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. Crear directorios en /tmp
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

// 2. Definir variables de storage
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('APP_MAINTENANCE_DRIVER=file');

$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['APP_MAINTENANCE_DRIVER'] = 'file';

$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['APP_MAINTENANCE_DRIVER'] = 'file';

// 3. Verificar existencia del archivo antes de requerirlo
$publicIndex = dirname(__DIR__) . '/public/index.php';

if (!file_exists($publicIndex)) {
    die("Error fatal: No se encuentra el archivo en la ruta: " . $publicIndex);
}

require $publicIndex;