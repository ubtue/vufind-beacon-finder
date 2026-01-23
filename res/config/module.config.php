<?php

namespace VuFindBEACONFinder\Module\Configuration;

$config = [
    'service_manager' => [
        'factories' => [
            'VuFindBEACONFinder\Service'  => 'VuFindBEACONFinder\ServiceFactory',
        ],
    ],
    'controllers' => [
        'factories' => [
            'VuFindBEACONFinder\Controller\AjaxController' => 'VuFind\Controller\AjaxControllerFactory',
            'VuFindBEACONFinder\Controller\AuthorityRecordController' => 'VuFind\Controller\AbstractBaseFactory',
        ],
        'aliases' => [
            'VuFind\Controller\AjaxController' => 'VuFindBEACONFinder\Controller\AjaxController',
            'VuFind\Controller\AuthorityRecordController' => 'VuFindBEACONFinder\Controller\AuthorityRecordController',
        ],
    ],
    'vufind' => [
        'plugin_managers' => [
            'ajaxhandler' => [
                'factories' => [
                    'VuFindBEACONFinder\AjaxHandler\GetBEACONReferences' => 'VuFindBEACONFinder\AjaxHandler\GetBEACONReferencesFactory',
                ],
                'aliases' => [
                    'getBEACONReferences' => 'VuFindBEACONFinder\AjaxHandler\GetBEACONReferences',
                ]
            ],
        ],
    ],
];
$dir = __DIR__;
return $config;
