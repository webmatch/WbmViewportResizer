<?php

require_once dirname(__FILE__) . '/../../Controllers/Frontend/ViewportResizer.php';

class ViewportResizerTests extends Enlight_Components_Test_Controller_TestCase
{
    /**
     * @var array
     */
    private $pluginConfig;

    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    public function setUp()
    {
        parent::setUp();

        $this->pluginConfig = Shopware()->Container()->get('shopware.plugin.cached_config_reader')->getByPluginName('WbmViewportResizer');
        $this->connection = Shopware()->Container()->get('dbal_connection');
    }

    public function testSmartyVariables()
    {
        $controller = $this->createViewportResizerController();

        $controller->indexAction();

        $templateAssigns = $controller->View()->getAssign();

        $this->assertArrayHasKey('homeUrl', $templateAssigns);
    }

    /**
     * @return Shopware_Controllers_Frontend_ViewportResizer
     */
    private function createViewportResizerController()
    {
        $view = new \Enlight_View_Default(Shopware()->Container()->get('template'));

        /** @var $controller */
        $proxy = Shopware()->Hooks()->getProxy('Shopware_Controllers_Frontend_ViewportResizer');

        /** @var $controller Shopware_Controllers_Frontend_ViewportResizer */
        $controller = new $proxy(
            new \Enlight_Controller_Request_RequestHttp(),
            new \Enlight_Controller_Response_ResponseHttp()
        );
        $controller->setContainer(Shopware()->Container());
        $controller->setView($view);

        return $controller;
    }
}