'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'sanctum', // Use sanctum for API authentication
        'provider' => 'users',
    ],
],
