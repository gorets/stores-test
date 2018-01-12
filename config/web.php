<?php

$baseUrl = str_replace('/web', '', (new \yii\web\Request)->getBaseUrl());
//echo $baseUrl; die;

$web_config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'StoresTest',
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'JzKALLPok3Ifgh67fgfghgftyjvbn62Zl-EEjNzaRb-TpJxrhx',
            'baseUrl' => $baseUrl,
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
////            'rules' => [
////                '' => 'site/index',
////                '<action>'=>'site/<action>',
////            ],
//        ],
    ],
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $web_config['bootstrap'][] = 'debug';
    $web_config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $web_config['bootstrap'][] = 'gii';
    $web_config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

}


$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    $web_config
);

//var_dump($config); die;

return $config;
