<?php

$console_config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [

    ],
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    $console_config
);
//var_dump($config); die;

return $config;
