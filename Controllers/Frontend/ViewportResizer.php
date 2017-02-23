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

/**
 * Class Shopware_Controllers_Frontend_ViewportResizer
 * @package WbmViewportResizer\Controllers\Frontend
 */
class Shopware_Controllers_Frontend_ViewportResizer extends Enlight_Controller_Action
{

    /**
     * index action is called if no other action is triggered
     * @return void
     */
    public function indexAction()
    {
        $path = $this->Request()->get('path') ? ltrim($this->Request()->get('path'), '/') : '';
        $this->View()->assign(
            'homeUrl',
            Shopware()->Front()->Router()->assemble(
                array(
                    'sViewport' => 'index',
                    'action' => 'index'
                )
            ) . $path
        );
    }
}
