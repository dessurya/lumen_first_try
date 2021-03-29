<?php
return [
    'defaults' => [
        'guard' => 'api',
        'password' => 'api',
    ],
    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ]
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model'  =>  App\Models\User::class,
        ]
    ],
    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => true,
    ],
    'passwords' => [],
];