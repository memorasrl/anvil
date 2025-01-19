<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Errors
    |--------------------------------------------------------------------------
    |
    | This are all the configured errors that the API Controller can return.
    | You can add more errors to this list, just follow the same structure.
    |
    */
    'errors' => [

        '400' => [
            'request/0001' => [
                'title' => 'Invalid request format.',
                'detail' => '{message}',
            ],

            'request/0002' => [
                'title' => 'Temporary uri expired.',
                'detail' => 'The searched uri expired. request a new one.',
            ],

            'request/0003' => [
                'title' => 'Invalid file given.',
                'detail' => 'The given file \'{filename}\' was not uploaded correctly or has an invalid extension.',
            ],

            'request/0004' => [
                'title' => 'Invalid Signature.',
                'detail' => 'The given URI has an invalid on missing signature attached to it.',
            ],

            'request/0005' => [
                'title' => 'Invalid file id given.',
                'detail' => 'The given attachment id was not found.',
            ],
        ],

        '401' => [
            'access/0001' => [
                'title' => 'Invalid credentials given.',
                'detail' => 'The given username and password do not match our records.',
            ],

            'access/0002' => [
                'title' => 'Given token is invalid or expired.',
                'detail' => 'The given bearer token is expired, invalid or missing.',
            ],

            'access/0003' => [
                'title' => 'The used auth protocol is not supported.',
                'detail' => 'The authentication protocol provided is not supported.',
            ],

        ],

        '403' => [
            'resource/0002' => [
                'title' => 'Access denied to this resource.',
                'detail' => 'You can\'t access the given resource.',
            ],
        ],

        '404' => [
            'resource/0001' => [
                'title' => 'Resource not found.',
                'detail' => 'We couldn\'t find the given resource.',
            ],

            'resource/0003' => [
                'title' => 'Method not supported.',
                'detail' => 'The method used for this route is not supported.',
            ],

            'resource/0004' => [
                'title' => 'Api version missing or invalid.',
                'detail' => 'Yuo must specify on the url the api version you want to work with.',
            ],
        ],

        '412' => [],

        '500' => [
            'system/0001' => [
                'title' => 'Internal server error.',
                'detail' => 'Not recorded internal server error, please report this issue.',
            ],

            'system/0002' => [
                'title' => 'The function doesn\'t exists.',
                'detail' => 'The function \'{function}\' doesn\'t exists in current namespace',
            ],

            'system/0003' => [
                'title' => 'Couldn\'t save entity on database.',
                'detail' => 'it wasn\'t possible to save the entity data on the database.',
            ],

            'system/0004' => [
                'title' => 'File couldn\'t be stored on the server.',
                'detail' => 'it wasn\'t possible to save the given file on the server, please retry later.',
            ],
            'system/0005' => [
                'title' => 'Couldn\'t delete entity on database.',
                'detail' => 'it wasn\'t possible to delete the entity data on the database.',
            ],
            'system/0006' => [
                'title' => 'Couldn\'t find the named route.',
                'detail' => '{message}',
            ],
            'system/0007' => [
                'title' => 'Error while training the model.',
                'detail' => 'An error occurred while training the model: {message}',
            ],
        ],

        '503' => [
            'maintain/0001' => [
                'title' => 'Service unavailable, system under maintenance.',
                'detail' => 'Service is currently unavailable due to scheduled maintenance.',
            ],
        ],

    ],

    'default_error' => [
        'code' => 400,
        'type' => 'request/0000',
        'title' => 'Unknown Error.',
        'detail' => 'Not currently mapped error, please report this.',
    ],

    'tokens' => [
        'auth' => [
            'name' => 'auth-token',
            'abilities' => ['access'],
            'expiration' => 60, // 1 hour
        ],
        'refresh' => [
            'name' => 'refresh-token',
            'abilities' => ['refresh'],
            'expiration' => 60 * 24 * 180, // 180 days
        ],
    ],
];
