<?php

namespace VuFindBEACONFinder;

use Laminas\ModuleManager\ModuleManager;

class Module
{
    /**
     * Get module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../res/config/module.config.php';
    }

    /**
     * Get autoloader configuration
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Laminas\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/',
                ],
            ],
        ];
    }

    /**
     * Initialize the module
     *
     * @param ModuleManager $m Module manager
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function init(ModuleManager $m)
    {
    }
}
