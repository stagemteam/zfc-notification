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

namespace Stagem\ZfcNotification\Model\Repository;

use Popov\ZfcCore\Model\Repository\EntityRepository;
use Stagem\Amazon\Model\Marketplace;
use Stagem\Product\Model\Product;
use Stagem\ZfcNotification\Model\Notification;
use Popov\ZfcEntity\Model\Entity;

class NotificationRepository extends EntityRepository
{
    protected $_alias = Notification::MNEMO;
    protected $_entity = Entity::MNEMO;


    public function getNotifications()
    {
        $qb = $this->createQueryBuilder($this->_alias)
        ->leftJoin($this->_alias . '.entity', $this->_entity);

        return $qb;
    }
}