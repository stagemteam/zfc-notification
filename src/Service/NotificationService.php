<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Stagem
 * @package Stagem_ZfcSystem
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcNotification\Service;

use Doctrine\ORM\EntityManager;
use Popov\ZfcEntity\Helper\ModuleHelper;
use Stagem\ZfcNotification\Model\Notification;
use Stagem\ZfcPool\Model\PoolInterface;
use Stagem\ZfcPool\Service\PoolService;
use Stagem\ZfcSystem\Config\Model\Config;
use Stagem\ZfcSystem\Config\Model\Repository\ConfigRepository;
use Popov\ZfcCore\Service\DomainServiceAbstract;
use Popov\Db\Db;

/**
 * Class NotificationService
 * @method HistoryRepository getRepository()
 */
class NotificationService extends DomainServiceAbstract
{
    protected $entity = Notification::class;

    public function __construct(ModuleHelper $moduleHelper, EntityManager $entityManager)
    {
        $this->moduleHelper = $moduleHelper;
        $this->entityManager = $entityManager;

    }

    public function getNotifications() {
        return $this->getRepository()->getNotifications();
    }

    //public function writeNotification(ContextInterface $contextProgress)
    public function writeNotification($contextNotification)
    {
        /** @var \Agere\ZfcDataGrid\Service\Progress\DataGridContext $contextProgress */
        //$om = $this->getObjectManager();
        $modulePlugin = $this->moduleHelper;
        $entityPlugin = $modulePlugin->getEntityHelper();

        //$context = $modulePlugin->setRealContext($contextNotification)->getRealModule();
        $context = $modulePlugin->setContext($contextNotification)->getModule();
        $entity = $entityPlugin->setContext($item = $contextNotification->getItem())->getEntity();
        //$user = $this->getUser();

        /*$notification = $this->getObjectModel();
        if (!$item->getId()) {
            if (!$om->contains($item)) {
                $om->persist($item);
            }
            $om->flush();
        }*/
        $notification = $this->getObjectModel();

        $notification->setTitle($contextNotification->getTitle())
            ->setDescription($contextNotification->getDescription())
            ->setUrl($contextNotification->getUrl())
            ->setType($contextNotification->getType())
            ->setCreatedAt(new \DateTime())
            ->setEntity($entity)
        ;

        $this->entityManager->persist($notification);
        $this->entityManager->flush();

        return $this;
    }

}