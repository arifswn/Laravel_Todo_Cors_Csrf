<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Izinkan semua metode (GET, POST, PUT, DELETE, dll.)
    'allowed_methods' => ['*'],

    // Izinkan semua domain atau ganti dengan domain spesifik
    // contoh: ['http://example.com'] > digunakan untuk domain client
    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    // Izinkan semua header atau ganti dengan header spesifik
    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // Jika kamu menggunakan cookie-based authentication, set menjadi true
    'supports_credentials' => false,

];
