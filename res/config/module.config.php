<?php

namespace VuFindCollapseExpand\Module\Configuration;

$config = [
    'service_manager' => [
        'factories' => [
            'VuFindBEACONFinder\Service'  => 'VuFindBEACONFinder\ServiceFactory',
        ],
    ],
    'controllers' => [
        'factories' => [
            'VuFindBEACONFinder\Controller\AuthorityRecordController' => 'VuFind\Controller\AbstractBaseFactory',
        ],
        'aliases' => [
            'VuFind\Controller\AuthorityRecordController' => 'VuFindBEACONFinder\Controller\AuthorityRecordController',
        ],
    ],
    'vufind' => [

    ],
];
$dir = __DIR__;
return $config;
