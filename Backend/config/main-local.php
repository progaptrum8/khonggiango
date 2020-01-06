<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ip5hBJ9qLajKk0NQ0SKjefwB98fd-_CQ',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=khonggiango',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8mb4',
        ],
    ],
];