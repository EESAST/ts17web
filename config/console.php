<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
            'username' => '15618380091@163.com',
            'password' => '*******',
            'port' => '25',
            'encryption' => 'tls',

        ],
        'messageConfig'=>[
            'charset'=>'UTF-8',
            'from'=>['15618380091@163.com'=>'admin']
        ],
    ],
];
