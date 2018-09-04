<?php

namespace Stagem\ZfcNotification\Listener;

use Popov\ZfcCurrent\CurrentHelper;
use Popov\ZfcCurrent\Plugin\CurrentPlugin;
use Popov\ZfcEntity\Helper\ModuleHelper;
use Stagem\Review\Service\Notification\ReviewContext;
use Stagem\ZfcNotification\Helper\ContextCreator;
use Stagem\ZfcNotification\Service\NotificationService;
use Zend\EventManager\Event;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Popov\ZfcCore\Helper\Config;


class NotificationListener
{

    /** @var [] */
    protected $globalConfig = [];

    /** @var CurrentHelper  */
    protected $currentHelper;

    /** @var NotificationService */
    protected $notificationService;

    /** @var ContextCreator */
    protected $contextCreator;

    public function __construct(
        CurrentHelper $currentHelper,
        Config $config,
        NotificationService $notificationService,
        ContextCreator $contextCreator
    )
    {
        $this->currentHelper = $currentHelper;
        $this->globalConfig = $config;
        $this->notificationService = $notificationService;
        $this->contextCreator = $contextCreator;
    }

    public function attach($e)
    {

        if (!($context = $e->getParam('context'))) {
            return;
        }

        $contextNamespace = $this->currentHelper->currentModule($context);

        if (!isset($this->globalConfig['notification'][$contextNamespace]['context'])) {
            return;
        }

        //@todo-vlad Витягувати поточний Context
        //$contextProgress = $sm->get($config['progress'][$contextNamespace]['context']);
        $contextNotification = $this->contextCreator->create($this->globalConfig['notification'][$contextNamespace]['context']);
        $contextNotification->setEvent($e);

        $this->notificationService->writeNotification($contextNotification);
    }
}