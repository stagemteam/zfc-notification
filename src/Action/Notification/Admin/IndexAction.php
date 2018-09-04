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
 * @package Stagem_Patient
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcNotification\Action\Notification\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\Server\RequestHandlerInterface;
#use Psr\Http\Server\RequestHandlerInterface;
use Zend\View\Model\ViewModel;
use Stagem\ZfcAction\Page\AbstractAction;
use Popov\ZfcUser\Controller\Plugin\UserPlugin;
use Stagem\ZfcPool\Controller\Plugin\PoolPlugin;

/**
 * @method UserPlugin user()
 * @method PoolPlugin pool()
 */
class IndexAction extends AbstractAction
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request->withAttribute(ViewModel::class, $this->action($request)));
    }

    public function action(ServerRequestInterface $request)
    {

        $params = ['newStatus' => 'test', 'oldStatus' => 'oldStatus', 'context' => $this];

        $this->getEventManager()->trigger('change', null, $params);

        $viewModel = (new ViewModel());


        return $viewModel;
    }
}