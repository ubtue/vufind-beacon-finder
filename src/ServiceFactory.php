<?php

namespace VuFindBEACONFinder;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ServiceFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ) {
        $obj = new $requestedName($container->get(\VuFind\Config\PluginManager::class)
            ->get('BEACONfinder'));
        if ($obj instanceof \VuFind\Http\CachingDownloaderAwareInterface) {
            $obj->setCachingDownloader($container->get(\VuFind\Http\CachingDownloader::class));
        }
        return $obj;
    }
}
