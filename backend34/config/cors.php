<?php

return [

    'paths' => ['api/*', 'login', 'logout', 'register', 'sanctum/csrf-cookie', 'auth/google/callback'],



    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'],

    // 'allowed_origins' => ['http://localhost:3000'], // frontend dyalek (React)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];

