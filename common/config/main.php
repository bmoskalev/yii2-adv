<?php

use common\services\AssignRoleEvent;
use common\services\ProjectService;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'projectService' => [
            'class' => common\services\ProjectService::class,
            'on ' . ProjectService::EVENT_ASSIGN_ROLE =>
                function (AssignRoleEvent $e) {
                    Yii::$app->notificationService->sendAboutNewProjectRole($e->project, $e->user, $e->role);
                },
        ],
        'notificationService' => [
            'class' => common\services\NotificationService::class,
        ],
        'emailService' => [
            'class' => common\services\EmailService::class,
        ],

    ],
    'modules' => [
        'chat' => [
            'class' => 'common\modules\chat\Module',
        ],
    ],
];
