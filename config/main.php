<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/vendor/',
    'language' => 'ru',
    'timeZone' => 'Europe/Kiev',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'db' => $db,
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app'       => 'app.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'locale' => 'ru-RU',
            'timeZone' => 'Europe/Kiev',
            'dateFormat' => 'dd.MM.Y',
            'timeFormat' => 'HH:mm:ss',
            'datetimeFormat' => 'dd.MM.Y HH:mm',
            //'datetimeFormat' => 'php:Y-m-d H:i:s',
        ],
    ],
    'params' => $params,
];

return $config;