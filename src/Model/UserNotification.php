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
 * @package Stagem_ZfcNotification
 * @author Vlad Kozak <vk@stagem.com.ua>
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Stagem\ZfcNotification\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Popov\ZfcCore\Model\DomainAwareTrait;
use Stagem\Amazon\Model\Marketplace;
use Stagem\Customer\Model\Customer;
use Stagem\Product\Model\Product;

/**
 * @ORM\Entity(repositoryClass="Stagem\ZfcNotification\Model\Repository\UserNotificationRepository")
 * @ORM\Table(name="user_notification")
 */
class UserNotification
{
    const MNEMO = 'user_notification';

    const TABLE = 'user_notification';

    use DomainAwareTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @var Notification
     * @ORM\ManyToOne(targetEntity="Stagem\ZfcNotification\Model\Notification")
     * @ORM\JoinColumn(name="notificationId", referencedColumnName="id", nullable=false)
     */
    private $notification;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Popov\ZfcUser\Model\User")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     * @ORM\Column(name="createdAt", nullable=false, type="datetime")
     */
    private $readAt;

    /**
     * @var boolean
     * @ORM\Column(name="isRead", type="smallint", nullable=true, options={"default":0})
     */
    private $isRead;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserNotification
     */
    public function setId(int $id): UserNotification
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Notification
     */
    public function getNotification(): Notification
    {
        return $this->notification;
    }

    /**
     * @param Notification $notification
     * @return UserNotification
     */
    public function setNotification(Notification $notification): UserNotification
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UserNotification
     */
    public function setUser(User $user): UserNotification
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReadAt(): \DateTime
    {
        return $this->readAt;
    }

    /**
     * @param \DateTime $readAt
     * @return UserNotification
     */
    public function setReadAt(\DateTime $readAt): UserNotification
    {
        $this->readAt = $readAt;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRead(): bool
    {
        return $this->isRead;
    }

    /**
     * @param bool $isRead
     * @return UserNotification
     */
    public function setIsRead(bool $isRead): UserNotification
    {
        $this->isRead = $isRead;

        return $this;
    }

}