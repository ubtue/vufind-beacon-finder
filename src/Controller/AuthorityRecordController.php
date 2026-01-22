<?php

namespace VuFindBEACONFinder\Controller;

class AuthorityRecordController extends \VuFind\Controller\AuthorityRecordController
{
    public function homeAction()
    {
        $result = parent::homeAction();
        $result->BEACONfinder = $this->serviceLocator->get(\VuFindBEACONFinder\Service::class);
        return $result;
    }
}
