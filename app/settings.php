<?php

// Do not modify this file. Instead, copy it to settings.php and modify that one.

return [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,

        'db' => [
            // Illuminate/database configuration
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'port'      =>  3308,
            'database'  => 'bookshelf',
            'username'  => 'root',
            'password'  => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];
