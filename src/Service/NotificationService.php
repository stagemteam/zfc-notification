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

use Stagem\ZfcNotification\Model\Notification;
use Stagem\ZfcPool\Model\PoolInterface;
use Stagem\ZfcPool\Service\PoolService;
use Stagem\ZfcSystem\Config\Model\Config;
use Stagem\ZfcSystem\Config\Model\Repository\ConfigRepository;
use Popov\ZfcCore\Service\DomainServiceAbstract;
use Popov\Db\Db;

/**
 * Class NotificationService
 */
class NotificationService extends DomainServiceAbstract
{
    protected $entity = Notification::class;

    public function __construct()
    {

    }

    public function writeNotification(ContextInterface $contextProgress)
    {
        /** @var \Agere\ZfcDataGrid\Service\Progress\DataGridContext $contextProgress */
        $om = $this->getObjectManager();
        $modulePlugin = $this->getModulePlugin();
        $entityPlugin = $modulePlugin->getEntityPlugin();

        $context = $modulePlugin->setRealContext($contextProgress)->getRealModule();
        $entity = $entityPlugin->setContext($item = $contextProgress->getItem())->getEntity();
        $user = $this->getUser();

        /** @var Progress $progress */
        $progress = $this->getObjectModel();
        if (!$item->getId()) {
            if (!$om->contains($item)) {
                $om->persist($item);
            }
            $om->flush();
        }

        $progress->setMessage($contextProgress->getMessage())
            ->setItemId($item->getId())
            ->setUser($user)
            ->setContext($context)
            ->setEntity($entity)
            ->setCreatedAt(new \DateTime('now'))
            ->setSnippet(serialize($item))
            ->setExtra($contextProgress->getExtra())
        ;

        $om->persist($progress);
        //$om->flush();

        return $this;
    }
}