<?php

namespace Stagem\ZfcNotification;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'event_manager' => require 'listener.config.php',

    'navigation' => require 'navigation.config.php',

    'actions' => [
        'notification' => __NAMESPACE__ . '\Action\Notification',
    ],

    // Doctrine config
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src//Model'],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],

];
