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

namespace Stagem\ZfcNotification\Block\Grid;

use Doctrine\ORM\Query\Expr;
use Stagem\ZfcNotification\Model\Notification;
use ZfcDatagrid\Filter;
use Popov\ZfcDataGrid\Block\AbstractGrid;

class NotificationGrid extends AbstractGrid
{
    protected $createButtonTitle = '';

    protected $backButtonTitle = '';

    protected $id = Notification::MNEMO;

    public function init()
    {
        $grid = $this->getDataGrid();
        //$grid->setId($this->mnemo);
        $grid->setTitle('Notifications');
        $colId = $this->add([
            'name' => 'Select',
            'construct' => ['id', $this->id],
            'identity' => true,
        ])->getDataGrid()->getColumnByUniqueId($this->id . '_id');
        $this->add([
            'name' => 'Select',
            'construct' => ['title', $this->id],
            //'construct' => [new Expr\Select("IDENTITY({$this->id}.asin)"), $this->id . '_asin'], // doctrine usage
            'label' => 'Title',
            'width' => 2,
        ]);
        $this->add([
            'name' => 'Select',
            'construct' => ['description', $this->id],
            //'construct' => [new Expr\Select("IDENTITY({$this->id}.marketplace)"), $this->id . '_marketplace'], // doctrine usage
            'label' => 'Description',
            'translation_enabled' => true,
            'width' => 3,
        ]);
        $this->add([
            'name' => 'Select',
            'construct' => ['url', $this->id],
            'label' => 'Url',
            'translation_enabled' => true,
            'width' =>  2,
        ]);
        $this->add([
            'name' => 'Select',
            'construct' => ['createdAt', $this->id],
            'label' => 'Date Create',
            'translation_enabled' => true,
            'width' => 1,
            'type' => ['name' => 'DateTime'],
			'sortDefault' => [1, 'DESC']

        ]);

        return $grid;
    }
}