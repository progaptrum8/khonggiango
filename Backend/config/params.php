<?php

return [
    'adminEmail' => 'admin@example.com',
    'filePath'=>'/Upload',
    'host_hienthivanban'=>"http://vbqn.unioffice.vn",
    'device' => [
        'android' => [
            'url' => 'https://fcm.googleapis.com/fcm/send',
            'auth_key' => 'AIzaSyBEFtEUSoyZ8zZCLvssao3NXK42NvHpk-U'
        ],
        'ios' => [
            'url' => 'ssl://gateway.sandbox.push.apple.com:2195',
            //'url' => 'ssl://gateway.push.apple.com:2195',
            'cert' => $_SERVER["DOCUMENT_ROOT"].'/app/vpquangngai.pem',
            'passphrase' => ''
        ]
    ],
    'pathFileCustom' => dirname(dirname(__DIR__))."/frontend/web",
];
