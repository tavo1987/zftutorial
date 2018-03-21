<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initAutoload()
    {
        $modelLoader = new Zend_Application_Module_Autoloader(array(
            'basePath' => APPLICATION_PATH,
            'namespace' => '',
        ));

        return $modelLoader;
    }

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
        $view->headTitle()->setSeparator(' | ');
        $view->headTitle('Zend Framework Tutorial');
    }
}

