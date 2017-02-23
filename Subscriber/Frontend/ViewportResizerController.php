<?php
/**
 * Viewport Resizer
 * Copyright (c) Webmatch GmbH
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

namespace WbmViewportResizer\Subscriber\Frontend;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\DependencyInjection\Container;

/**
 * Class ViewportResizerController
 * @package WbmViewportResizer\Subscriber\Backend
 */
class ViewportResizerController implements SubscriberInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Frontend_ViewportResizer' => 'onViewportResizerController'
        ];
    }

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return string
     */
    public function onViewportResizerController()
    {
        $this->container->get('template')->addTemplateDir(
            $this->container->getParameter('wbm_viewport_resizer.plugin_dir') . '/Resources/views/'
        );

        return $this->container->getParameter('wbm_viewport_resizer.plugin_dir') . '/Controllers/Frontend/ViewportResizer.php';
    }
}