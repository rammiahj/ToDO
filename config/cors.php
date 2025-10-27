<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:8081','http://127.0.0.1:8081','http://localhost:5173'],
    'allowed_headers' => ['*'],
    'supports_credentials' => false,
];
