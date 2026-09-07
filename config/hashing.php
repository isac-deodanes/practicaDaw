<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    */

    'driver' => env('HASH_DRIVER', 'bcrypt'),

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
        'verify' => env('HASH_VERIFY', true),
        'limit' => env('HASH_BCRYPT_LIMIT'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rehash On Login
    |--------------------------------------------------------------------------
    | Desactivado: en el runtime serverless de Vercel, la llamada interna a
    | password_hash() que Laravel hace para "rehashear" la contraseña justo
    | después de un login exitoso está fallando (Bcrypt hashing not
    | supported). El login en sí (password_verify) funciona perfecto sin
    | esto, así que lo apagamos para no bloquear el acceso.
    |
    */

    'rehash_on_login' => false,

];