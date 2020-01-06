<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'home/default/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'allimi@Unitech2017',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\auth\models\User',
            'enableAutoLogin' => true,
            'loginUrl'=>['/auth/user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'error/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['api/duan']],
            ],
        ],
    ],
    'modules' => [
        'error' => [
            'class' => 'app\modules\error\Module',
        ],
        'auth' => [
            'class' => 'app\modules\auth\Module',
        ],
        'qtht' => [
            'class' => 'app\modules\qtht\Module',
        ],
        'home' => [
            'class' => 'app\modules\home\Module',
        ],
        'danhmuc' => [
            'class' => 'app\modules\danhmuc\Module',
        ],
        'thongtin' => [
            'class' => 'app\modules\thongtin\Module',
        ],
        'baocao' => [
            'class' => 'app\modules\baocao\Module',
        ],
        'sanpham' => [
            'class' => 'app\modules\sanpham\Module',
        ],
    ],
    'params' => $params,       
    'as access' => [
         'class' => 'app\components\AccessControl',
         'allowActions' => [  
            'gii/*',
            'auth/user/login',
            'auth/user/logout',
            'thongtin/filedinhkem/download'
         ]
    ]
    
];

// if (YII_ENV_DEV) {
//     // configuration adjustments for 'dev' environment
//     $config['bootstrap'][] = 'debug';
//     $config['modules']['debug'] = [
//         'class' => 'yii\debug\Module',
//         // uncomment the following to add your IP if you are not connecting from localhost.
//         'allowedIPs' => ['127.0.0.1', '::1'],
//     ];

//     $config['bootstrap'][] = 'gii';
//     $config['modules']['gii'] = [
//         'class' => 'yii\gii\Module',
//         // uncomment the following to add your IP if you are not connecting from localhost.
//         'allowedIPs' => ['127.0.0.1', '::1'],
//     ];
// }

return $config;
