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
 * @package Stagem_Notification
 * @author Vlad Kozak <vlad.gem.typ@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcNotification;


return [
    'admin' => [
        Model\Notification::MNEMO => [
            'module' => Model\Notification::MNEMO,
            'label' => 'Notifications',
            'route' => 'admin/default',
            'controller' => 'notification',
            'action' => 'index',
            'order' => 110,
        ],
    ],
];