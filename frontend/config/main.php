<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'session' => [
            'timeout' => 2000,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'loginUrl' => ['/user/signin/login'],
            'enableAutoLogin' => FALSE,
            'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
                'path' => '/'  // correct path for the frontend app.
            ]
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLan'
                    . 'guage' => 'en',
                    'fileMap' => [
                    ],
                ],
            ],
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
        'errorHandler' => [
            'errorAction' => 'signin/error',
        ],
        'request' => [
            'cookieValidationKey' => 'oXbcAeLFqvAdMFRboE1WD6_YSACZ2tCC',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'useFileTransport' => true,
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => SMTP_HOST,
                'username' => SMTP_USER,
                'password' => SMTP_PASSWORD,
                'port' => SMTP_PORT,
                'encryption' => SMTP_ENCRYPTION,
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'loging' => 'signin/loging',
                'logout' => 'signin/logout',
                'checksignupemailmob' => '/signin/signupdobregischeck',
                'forgotpassword' => 'signin/forgotpassword',
                'setting' => 'dashboard/changepassword',
                'user-create' => 'user/create',
                'user-list' => 'user/userlist',
                'destination-list' => 'destination/index',
                'destination-create' => 'destination/create',
                //
                'hotelname-list' => 'hotel-name/index',
                'hotelname-create' => 'hotel-name/create',
                //
                'rooms-list' => 'rooms/index',
                'rooms-create' => 'rooms/create',
                //
                //
                'hotels-list' => 'hotels/index',
                'hotels-create' => 'hotels/create',
                //
                'booking-list' => 'booking/index',
                'booking-create' => 'booking/create',
                //
                'roomtype-list' => 'roomtype/index',
                'roomtype-create' => 'roomtype/create',
                //
                'enquire-list' => 'booking/enquireindex',
                 //
                'passwordchange' => 'user/setting',
                 //
                'dashboard' => 'user/dashboard',
                
                
            ],
        ],
    ],
    'params' => $params,
];
?>