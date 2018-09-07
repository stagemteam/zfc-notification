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
use Popov\ZfcEntity\Model\Entity;

/**
 * @ORM\Entity(repositoryClass="Stagem\ZfcNotification\Model\Repository\NotificationRepository")
 * @ORM\Table(name="notification")
 */
class Notification
{
    const MNEMO = 'notification';

    const TABLE = 'notification';

    use DomainAwareTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * Review Code
     *
     * @var string
     * @ORM\Column(type="string", length=255, unique=false, nullable=false)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text", unique=false, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="createdAt", nullable=false, type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=false, nullable=false)
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=false, nullable=false)
     */
    private $type;

    /**
     * @var Entity
     * @ORM\ManyToOne(targetEntity="Popov\ZfcEntity\Model\Entity")
     * @ORM\JoinColumn(name="entityId", referencedColumnName="id", nullable=false)
     */
    private $entity;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Notification
     */
    public function setId(int $id): Notification
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Notification
     */
    public function setTitle(string $title): Notification
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Notification
     */
    public function setDescription(string $description): Notification
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Notification
     */
    public function setCreatedAt(\DateTime $createdAt): Notification
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Notification
     */
    public function setUrl(string $url): Notification
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Notification
     */
    public function setType(string $type): Notification
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     * @return Notification
     */
    public function setEntity(Entity $entity): Notification
    {
        $this->entity = $entity;

        return $this;
    }

}