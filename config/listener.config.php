<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Stagem Team
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Stagem
 * @package Stagem_Asin
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
return [
    'definitions' => [
        'notification' => [
            'listener' => Stagem\ZfcNotification\Listener\NotificationListener::class,
            'method' => 'attach',
            'event' => ['change'],
            //'event' => 'reviewDown',
            //'identifier' => Stagem\ZfcNotification\Action\Notification\Admin\IndexAction::class,
            'identifier' => '*',
            'priority' => 100,
        ],



        /*'notification' => [
            'event' => ['otherEvent'],
        ],*/
    ],
];